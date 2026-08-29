#!/usr/bin/env bash
# Static export for Netlify.
#
# Netlify has no PHP runtime, so every route is rendered once through the PHP
# CLI server and written to dist/ as plain HTML. Assets are copied verbatim.
# Run with: npm run export
set -euo pipefail
cd "$(dirname "$0")/.."

PORT=8399
OUT=dist

command -v php >/dev/null || { echo "php not found"; exit 1; }

echo "→ building css"
npm run build --silent

echo "→ starting php on :$PORT"
php -S "127.0.0.1:$PORT" > /dev/null 2>&1 &
SRV=$!
trap 'kill $SRV 2>/dev/null || true' EXIT
sleep 2

rm -rf "$OUT"
mkdir -p "$OUT"

# Every directory holding an index.php is a route, plus the site root. The
# root reduces to an empty path, which word-splitting would drop, so it is
# carried through the list as "." and expanded again inside the loop.
ROUTES=$(find . -name index.php \
          -not -path './node_modules/*' -not -path './partials/*' -not -path "./$OUT/*" \
        | sed 's|^\./||; s|index\.php$||; s|^$|.|' | sort)

COUNT=0
for r in $ROUTES; do
  if [ "$r" = "." ]; then url="/"; dest="$OUT"; else url="/$r"; dest="$OUT/$r"; fi
  mkdir -p "$dest"
  code=$(curl -s -o "$dest/index.html" -w '%{http_code}' "http://127.0.0.1:$PORT$url")
  if [ "$code" != "200" ]; then
    echo "  ✗ $url -> $code"; exit 1
  fi
  # A PHP warning or notice in the output means the page rendered wrong.
  if grep -qiE '<b>(Warning|Notice|Fatal error)</b>|Parse error' "$dest/index.html"; then
    echo "  ✗ $url contains a PHP error"; exit 1
  fi
  printf '  %-44s %s\n' "$url" "$(wc -c < "$dest/index.html" | tr -d ' ') bytes"
  COUNT=$((COUNT+1))
done

echo "→ copying assets"
mkdir -p "$OUT/assets"
for d in img fonts css js; do
  [ -d "assets/$d" ] && cp -R "assets/$d" "$OUT/assets/"
done

# Video is copied by reference only. The directory holds unused cuts that would
# otherwise add tens of megabytes to every clone and deploy.
if [ -d assets/video-bg ]; then
  mkdir -p "$OUT/assets/video-bg"
  grep -rho 'video-bg/[^"'"'"')]*' "$OUT" --include='*.html' | sort -u | while read -r v; do
    src="assets/${v#video-bg/}"
    [ -f "assets/$v" ] && cp "assets/$v" "$OUT/assets/video-bg/" && echo "  video: $v"
  done
fi
# Source maps and the unminified entry are not needed in the deploy.
rm -f "$OUT/assets/css/main.css"

# Netlify serves 404.html for unknown paths; the route itself is redundant.
mv "$OUT/404/index.html" "$OUT/404.html"
rmdir "$OUT/404"

echo "→ $COUNT routes written to $OUT/"

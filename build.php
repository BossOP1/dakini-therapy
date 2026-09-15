<?php
/**
 * PHP CLI build trigger script.
 * Delegates to bash tools/export.sh (or npm run export).
 */
echo "→ Running static export for Netlify deploy...\n";
passthru('npm run export', $returnCode);
exit($returnCode);

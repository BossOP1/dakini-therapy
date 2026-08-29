<?php
/**
 * Contact form handler.
 *
 * Deliberately minimal and dependency-free. It validates, rate-limits by IP,
 * checks a honeypot, and mails the practice. It does NOT store anything: the
 * form is not a HIPAA-safe channel and the page says so, so the less that is
 * written to disk the better.
 *
 * Set CONTACT_TO below before this goes live — the practice publishes no email
 * address, so there is nothing to default to.
 */
const CONTACT_TO = '';          // e.g. 'ziji@dakini-therapy.com'
const RATE_LIMIT_SECONDS = 60;

function contact_handle(array $post, array $server): array
{
    // Honeypot: a real person never fills a field they cannot see.
    if (!empty($post['website'] ?? '')) {
        return ['ok' => true, 'message' => 'Thank you — your message has been sent.'];
    }

    $name    = trim($post['name'] ?? '');
    $email   = trim($post['email'] ?? '');
    $phone   = trim($post['phone'] ?? '');
    $office  = trim($post['office'] ?? '');
    $prefer  = trim($post['prefer'] ?? '');
    $message = trim($post['message'] ?? '');

    $errors = [];
    if ($name === '')                                     $errors['name']    = 'Please tell me your name.';
    if ($email === '' && $phone === '')                   $errors['email']   = 'Please leave either an email address or a phone number.';
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL))
                                                          $errors['email']   = 'That email address does not look right.';
    if ($message === '')                                  $errors['message'] = 'Please add a short message.';
    if (mb_strlen($message) > 4000)                       $errors['message'] = 'Please keep this under 4000 characters.';
    if ($errors) return ['ok' => false, 'errors' => $errors];

    // One submission per minute per IP, tracked in the session rather than a file.
    if (session_status() === PHP_SESSION_NONE) @session_start();
    $last = $_SESSION['contact_last'] ?? 0;
    if (time() - $last < RATE_LIMIT_SECONDS) {
        return ['ok' => false, 'errors' => ['message' => 'That went through a moment ago — please give it a minute.']];
    }
    $_SESSION['contact_last'] = time();

    if (CONTACT_TO === '') {
        // Fail loudly in the log, gently on the page: silently dropping an
        // enquiry from someone looking for a therapist is the worst outcome.
        error_log('Contact form: CONTACT_TO is not set in lib/contact-handler.php — message not delivered.');
        return ['ok' => false, 'errors' => ['message' => 'The form is not connected yet. Please call ' . '(561) 343-1985' . ' instead.']];
    }

    $body = "New enquiry from the website\n\n"
          . "Name:     {$name}\n"
          . "Email:    " . ($email ?: '—') . "\n"
          . "Phone:    " . ($phone ?: '—') . "\n"
          . "Office:   " . ($office ?: 'no preference') . "\n"
          . "Prefers:  " . ($prefer ?: 'no preference') . "\n\n"
          . "Message:\n{$message}\n";

    $headers = "From: Dakini Therapy website <no-reply@" . ($server['HTTP_HOST'] ?? 'dakini-therapy.com') . ">\r\n";
    if ($email !== '') $headers .= "Reply-To: " . str_replace(["\r", "\n"], '', $email) . "\r\n";

    $sent = @mail(CONTACT_TO, 'Website enquiry from ' . $name, $body, $headers);
    if (!$sent) {
        error_log('Contact form: mail() returned false.');
        return ['ok' => false, 'errors' => ['message' => 'Something went wrong sending that. Please call instead.']];
    }
    return ['ok' => true, 'message' => 'Thank you — your message has been sent. I aim to reply within two business days.'];
}

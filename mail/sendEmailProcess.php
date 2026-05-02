<?php

require "../mail/SMTP.php";
require "../mail/PHPMailer.php";
require "../mail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

// ─── Input sanitizer ───────────────────────────────────────────────────────────
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// ─── Brand SVG icons (inline, white fill) ──────────────────────────────────────
$svg_facebook = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#ffffff"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>';

$svg_whatsapp = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#ffffff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.128.558 4.122 1.532 5.852L.057 23.428a.5.5 0 00.611.61l5.608-1.46A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.907 0-3.693-.5-5.24-1.375l-.374-.216-3.878 1.009 1.032-3.768-.234-.386A9.944 9.944 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>';

$svg_tiktok = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#ffffff"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.7a8.18 8.18 0 004.77 1.52V6.77a4.85 4.85 0 01-1-.08z"/></svg>';

// ─── Shared social icon row ─────────────────────────────────────────────────────
function socialIconRow($svg_fb, $svg_wa, $svg_tt) {
    return '
      <tr>
        <td align="center" style="padding:24px 40px 28px;">
          <p style="margin:0 0 14px;font-size:10px;letter-spacing:3px;
                    color:rgba(255,255,255,0.3);text-transform:uppercase;
                    font-family:Arial,Helvetica,sans-serif;">
            Follow Our Adventures
          </p>
          <table cellpadding="0" cellspacing="0" border="0" align="center">
            <tr>
              <td style="padding:0 8px;">
                <a href="https://www.facebook.com/share/1Bs3cBNbkj/?mibextid=wwXIfr" target="_blank"
                   style="display:inline-block;width:44px;height:44px;border-radius:50%;
                          background:#1877F2;text-align:center;line-height:48px;
                          text-decoration:none;vertical-align:middle;">
                  ' . $svg_fb . '
                </a>
              </td>
              <td style="padding:0 8px;">
                <a href="https://wa.link/lzcezh" target="_blank"
                   style="display:inline-block;width:44px;height:44px;border-radius:50%;
                          background:#25D366;text-align:center;line-height:48px;
                          text-decoration:none;vertical-align:middle;">
                  ' . $svg_wa . '
                </a>
              </td>
              <td style="padding:0 8px;">
                <a href="https://www.tiktok.com/@travelpartnerkanneliya?_r=1&_t=ZS-92JbmMsXzKm" target="_blank"
                   style="display:inline-block;width:44px;height:44px;border-radius:50%;
                          background:#010101;border:1px solid rgba(255,255,255,0.2);
                          text-align:center;line-height:48px;
                          text-decoration:none;vertical-align:middle;">
                  ' . $svg_tt . '
                </a>
              </td>
            </tr>
          </table>
        </td>
      </tr>';
}

// ─── Shared Evon footer credit ──────────────────────────────────────────────────
function evonCredit() {
    return '
      <tr>
        <td style="background:#050f14;padding:14px 40px;text-align:center;
                   border-top:1px solid rgba(78,205,196,0.05);">
          <p style="margin:0;font-size:10px;letter-spacing:0.5px;
                    color:rgba(255,255,255,0.15);font-family:Arial,Helvetica,sans-serif;">
            Design &amp; Developed by &nbsp;
            <a href="https://evotechsoftwaresolutions.com" target="_blank"
               style="color:rgba(78,205,196,0.45);text-decoration:none;font-weight:700;">
              Evon Technologies Software Solutions (PVT) Ltd.
            </a>
          </p>
        </td>
      </tr>';
}

// ─── Variables ─────────────────────────────────────────────────────────────────
$fname   = $lname = $phone = $email = $message = '';
$errors  = [];

// ─── Process POST ──────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname   = sanitizeInput($_POST['fname']   ?? '');
    $lname   = sanitizeInput($_POST['lname']   ?? '');
    $phone   = sanitizeInput($_POST['phone']   ?? '');
    $email   = sanitizeInput($_POST['email']   ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');

    if (empty($fname))   $errors[] = "First name is required.";
    if (empty($lname))   $errors[] = "Last name is required.";

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^\+?\d{4,18}$/', $phone)) {
        $errors[] = "Phone number must be digits only (4–18 characters).";
    }

    if (empty($email)) {
        $errors[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($message)) $errors[] = "Message is required.";

    if (empty($errors)) {

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'et.website.message@gmail.com';
        $mail->Password   = 'YOUR_APP_PASSWORD_HERE';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->CharSet    = 'UTF-8';
        $mail->setFrom('et.website.message@gmail.com', 'Travel Partner Kanneliya');
        $mail->addReplyTo($email, $fname . ' ' . $lname);

        // ════════════════════════════════════════════════════════════════════════
        //  EMAIL 1 — OWNER NOTIFICATION
        // ════════════════════════════════════════════════════════════════════════
        $mail->addAddress('info@travelpartnerkanneliya.com');
        $mail->isHTML(true);
        $mail->Subject = '=?UTF-8?B?' . base64_encode('📩 New Enquiry — ' . $fname . ' ' . $lname) . '?=';

        $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>New Enquiry</title>
</head>
<body style="margin:0;padding:0;background:#060e13;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#060e13;padding:48px 0;">
  <tr><td align="center">

  <table width="600" cellpadding="0" cellspacing="0" border="0"
         style="background:#0c1f2b;border-radius:16px;overflow:hidden;
                border:1px solid rgba(78,205,196,0.2);
                box-shadow:0 32px 80px rgba(0,0,0,0.6);">

    <!-- TOP ACCENT BAR -->
    <tr><td style="height:3px;background:linear-gradient(to right,#4ecdc4,#2bb5ac,#4ecdc4);padding:0;line-height:0;font-size:0;">&nbsp;</td></tr>

    <!-- HEADER -->
    <tr>
      <td style="background:linear-gradient(160deg,#071e28 0%,#0a3a44 55%,#062030 100%);padding:30px 40px 26px;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="vertical-align:middle;">
              <p style="margin:0 0 4px;font-size:9px;letter-spacing:5px;color:#4ecdc4;
                        text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;">
                Travel Partner
              </p>
              <h1 style="margin:0;font-family:Georgia,serif;font-size:28px;
                         font-weight:400;color:#ffffff;letter-spacing:2px;">
                Kanneliya
              </h1>
              <div style="margin-top:10px;width:36px;height:2px;
                          background:linear-gradient(to right,#4ecdc4,transparent);"></div>
            </td>
            <td align="right" style="vertical-align:middle;">
              <span style="display:inline-block;background:rgba(78,205,196,0.12);
                           border:1px solid rgba(78,205,196,0.4);border-radius:30px;
                           padding:8px 16px;font-size:10px;letter-spacing:2px;
                           color:#4ecdc4;text-transform:uppercase;
                           font-family:Arial,Helvetica,sans-serif;">
                New Enquiry
              </span>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <!-- INTRO -->
    <tr>
      <td style="padding:30px 40px 10px;">
        <h2 style="margin:0 0 10px;font-family:Georgia,serif;font-size:20px;
                   font-weight:400;color:#ffffff;">
          You have a new message!
        </h2>
        <p style="margin:0;font-size:13px;color:rgba(255,255,255,0.5);
                  line-height:1.8;font-family:Arial,Helvetica,sans-serif;">
          A visitor submitted the contact form on your website.
          Full details are listed below.
        </p>
      </td>
    </tr>

    <!-- DETAIL CARDS -->
    <tr>
      <td style="padding:12px 40px 8px;">

        <!-- Name -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="margin-bottom:10px;
                      background:linear-gradient(135deg,rgba(78,205,196,0.08),rgba(78,205,196,0.02));
                      border:1px solid rgba(78,205,196,0.18);border-radius:10px;">
          <tr>
            <td style="padding:16px 18px;width:56px;vertical-align:middle;">
              <div style="width:42px;height:42px;border-radius:10px;
                          background:rgba(78,205,196,0.15);
                          border:1px solid rgba(78,205,196,0.3);
                          text-align:center;line-height:42px;font-size:20px;">
                👤
              </div>
            </td>
            <td style="padding:16px 18px 16px 8px;vertical-align:middle;">
              <p style="margin:0 0 3px;font-size:9px;letter-spacing:2.5px;
                        color:rgba(78,205,196,0.8);text-transform:uppercase;
                        font-family:Arial,Helvetica,sans-serif;">Full Name</p>
              <p style="margin:0;font-size:16px;font-weight:700;color:#ffffff;
                        font-family:Arial,Helvetica,sans-serif;">
                ' . $fname . '&nbsp;' . $lname . '
              </p>
            </td>
          </tr>
        </table>

        <!-- Phone -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="margin-bottom:10px;
                      background:linear-gradient(135deg,rgba(78,205,196,0.08),rgba(78,205,196,0.02));
                      border:1px solid rgba(78,205,196,0.18);border-radius:10px;">
          <tr>
            <td style="padding:16px 18px;width:56px;vertical-align:middle;">
              <div style="width:42px;height:42px;border-radius:10px;
                          background:rgba(78,205,196,0.15);
                          border:1px solid rgba(78,205,196,0.3);
                          text-align:center;line-height:42px;font-size:20px;">
                📞
              </div>
            </td>
            <td style="padding:16px 18px 16px 8px;vertical-align:middle;">
              <p style="margin:0 0 3px;font-size:9px;letter-spacing:2.5px;
                        color:rgba(78,205,196,0.8);text-transform:uppercase;
                        font-family:Arial,Helvetica,sans-serif;">Mobile Number</p>
              <p style="margin:0;font-size:16px;font-weight:700;color:#ffffff;
                        font-family:Arial,Helvetica,sans-serif;">
                ' . $phone . '
              </p>
            </td>
          </tr>
        </table>

        <!-- Email -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="margin-bottom:10px;
                      background:linear-gradient(135deg,rgba(78,205,196,0.08),rgba(78,205,196,0.02));
                      border:1px solid rgba(78,205,196,0.18);border-radius:10px;">
          <tr>
            <td style="padding:16px 18px;width:56px;vertical-align:middle;">
              <div style="width:42px;height:42px;border-radius:10px;
                          background:rgba(78,205,196,0.15);
                          border:1px solid rgba(78,205,196,0.3);
                          text-align:center;line-height:42px;font-size:20px;">
                ✉️
              </div>
            </td>
            <td style="padding:16px 18px 16px 8px;vertical-align:middle;">
              <p style="margin:0 0 3px;font-size:9px;letter-spacing:2.5px;
                        color:rgba(78,205,196,0.8);text-transform:uppercase;
                        font-family:Arial,Helvetica,sans-serif;">Email Address</p>
              <p style="margin:0;font-size:15px;font-weight:700;
                        font-family:Arial,Helvetica,sans-serif;">
                <a href="mailto:' . $email . '"
                   style="color:#4ecdc4;text-decoration:none;">
                  ' . $email . '
                </a>
              </p>
            </td>
          </tr>
        </table>

        <!-- Message -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="background:linear-gradient(135deg,rgba(78,205,196,0.08),rgba(78,205,196,0.02));
                      border:1px solid rgba(78,205,196,0.18);border-radius:10px;">
          <tr>
            <td style="padding:18px 18px 6px;width:56px;vertical-align:top;">
              <div style="width:42px;height:42px;border-radius:10px;
                          background:rgba(78,205,196,0.15);
                          border:1px solid rgba(78,205,196,0.3);
                          text-align:center;line-height:42px;font-size:20px;">
                💬
              </div>
            </td>
            <td style="padding:18px 18px 18px 8px;vertical-align:top;">
              <p style="margin:0 0 8px;font-size:9px;letter-spacing:2.5px;
                        color:rgba(78,205,196,0.8);text-transform:uppercase;
                        font-family:Arial,Helvetica,sans-serif;">Message</p>
              <p style="margin:0;font-size:14px;color:rgba(255,255,255,0.82);
                        line-height:1.85;font-family:Arial,Helvetica,sans-serif;">
                ' . nl2br($message) . '
              </p>
            </td>
          </tr>
        </table>

      </td>
    </tr>

    <!-- CTA BUTTON -->
    <tr>
      <td align="center" style="padding:28px 40px 16px;">
        <a href="mailto:' . $email . '"
           style="display:inline-block;padding:15px 48px;
                  background:linear-gradient(135deg,#4ecdc4 0%,#2bb5ac 100%);
                  color:#041018;font-size:12px;font-weight:800;
                  letter-spacing:2.5px;text-transform:uppercase;
                  text-decoration:none;border-radius:8px;
                  font-family:Arial,Helvetica,sans-serif;
                  box-shadow:0 8px 24px rgba(78,205,196,0.3);">
          &#8617;&nbsp; Reply to ' . $fname . '
        </a>
      </td>
    </tr>

    <!-- DIVIDER -->
    <tr>
      <td style="padding:4px 40px 0;">
        <div style="height:1px;background:linear-gradient(to right,
                    transparent,rgba(78,205,196,0.2),transparent);"></div>
      </td>
    </tr>

    <!-- SOCIAL ICONS -->
    ' . socialIconRow($svg_facebook, $svg_whatsapp, $svg_tiktok) . '

    <!-- FOOTER -->
    <tr>
      <td style="background:#071318;padding:20px 40px;text-align:center;
                 border-top:1px solid rgba(78,205,196,0.08);">
        <p style="margin:0 0 4px;font-size:12px;color:rgba(255,255,255,0.28);
                  font-family:Arial,Helvetica,sans-serif;">
          &copy; ' . date('Y') . ' Travel Partner Kanneliya &nbsp;&middot;&nbsp;
          Kanneliya Rain Forest, Galle, Sri Lanka
        </p>
        <p style="margin:0;font-size:11px;color:rgba(255,255,255,0.15);
                  font-family:Arial,Helvetica,sans-serif;">
          +94 74 055 3769 &nbsp;&middot;&nbsp; info@travelpartnerkanneliya.com
        </p>
      </td>
    </tr>

    ' . evonCredit() . '

  </table>

  </td></tr>
</table>

</body>
</html>';

        if (!$mail->send()) {
            echo 'Service Unavailable. Please try again later.';
            exit;
        }

        // ════════════════════════════════════════════════════════════════════════
        //  EMAIL 2 — CLIENT CONFIRMATION
        // ════════════════════════════════════════════════════════════════════════
        $mail->clearAddresses();
        $mail->clearReplyTos();
        $mail->addAddress($email, $fname . ' ' . $lname);
        $mail->addReplyTo('info@travelpartnerkanneliya.com', 'Travel Partner Kanneliya');
        $mail->Subject = 'We received your message — Travel Partner Kanneliya';

        $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Thank You</title>
</head>
<body style="margin:0;padding:0;background:#060e13;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#060e13;padding:48px 0;">
  <tr><td align="center">

  <table width="600" cellpadding="0" cellspacing="0" border="0"
         style="background:#0c1f2b;border-radius:16px;overflow:hidden;
                border:1px solid rgba(78,205,196,0.2);
                box-shadow:0 32px 80px rgba(0,0,0,0.6);">

    <!-- TOP ACCENT BAR -->
    <tr><td style="height:3px;background:linear-gradient(to right,#4ecdc4,#2bb5ac,#4ecdc4);padding:0;line-height:0;font-size:0;">&nbsp;</td></tr>

    <!-- HERO HEADER -->
    <tr>
      <td style="background:linear-gradient(160deg,#071e28 0%,#0a3a44 55%,#062030 100%);
                 padding:40px 40px 34px;text-align:center;">

        <div style="display:inline-block;width:66px;height:66px;border-radius:50%;
                    background:rgba(78,205,196,0.12);
                    border:1.5px solid rgba(78,205,196,0.45);
                    text-align:center;line-height:66px;font-size:30px;
                    margin-bottom:18px;">
          &#127807;
        </div>

        <p style="margin:0 0 5px;font-size:9px;letter-spacing:5px;
                  color:#4ecdc4;text-transform:uppercase;
                  font-family:Arial,Helvetica,sans-serif;">
          Travel Partner
        </p>
        <h1 style="margin:0 0 14px;font-family:Georgia,serif;font-size:32px;
                   font-weight:400;color:#ffffff;letter-spacing:2px;">
          Kanneliya
        </h1>
        <div style="width:56px;height:1px;margin:0 auto 18px;
                    background:linear-gradient(to right,transparent,#4ecdc4,transparent);"></div>
        <p style="margin:0;font-size:10px;letter-spacing:3px;
                  color:rgba(255,255,255,0.32);text-transform:uppercase;
                  font-family:Arial,Helvetica,sans-serif;">
          Rainforest Experiences &nbsp;&middot;&nbsp; Galle, Sri Lanka
        </p>

      </td>
    </tr>

    <!-- SUCCESS BADGE + GREETING -->
    <tr>
      <td align="center" style="padding:36px 40px 8px;">
        <span style="display:inline-block;
                     background:rgba(78,205,196,0.12);
                     border:1px solid rgba(78,205,196,0.4);
                     border-radius:30px;
                     padding:8px 22px;
                     font-size:10px;letter-spacing:2.5px;
                     color:#4ecdc4;text-transform:uppercase;
                     font-family:Arial,Helvetica,sans-serif;
                     margin-bottom:22px;">
          &#10003;&nbsp; Message Received
        </span>

        <h2 style="margin:0 0 14px;font-family:Georgia,serif;font-size:26px;
                   font-weight:400;color:#ffffff;line-height:1.3;">
          Thank you, ' . $fname . '!
        </h2>
        <p style="margin:0 auto;max-width:440px;font-size:14px;
                  color:rgba(255,255,255,0.55);line-height:1.9;
                  font-family:Arial,Helvetica,sans-serif;">
          We have successfully received your message and our team will
          get back to you as soon as possible. We look forward to making
          your Kanneliya experience truly unforgettable.
        </p>
      </td>
    </tr>

    <!-- DIVIDER -->
    <tr>
      <td style="padding:28px 40px 0;">
        <div style="height:1px;background:linear-gradient(to right,
                    transparent,rgba(78,205,196,0.22),transparent);"></div>
      </td>
    </tr>

    <!-- WHAT HAPPENS NEXT -->
    <tr>
      <td style="padding:28px 40px 8px;">
        <p style="margin:0 0 18px;font-size:10px;font-weight:700;
                  color:rgba(78,205,196,0.85);letter-spacing:3px;
                  text-transform:uppercase;text-align:center;
                  font-family:Arial,Helvetica,sans-serif;">
          What Happens Next
        </p>

        <!-- Step 1 -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="margin-bottom:10px;
                      background:rgba(78,205,196,0.04);
                      border:1px solid rgba(78,205,196,0.12);border-radius:10px;">
          <tr>
            <td style="padding:15px 18px;width:54px;vertical-align:middle;">
              <div style="width:36px;height:36px;border-radius:50%;
                          background:rgba(78,205,196,0.15);
                          border:1px solid rgba(78,205,196,0.4);
                          text-align:center;line-height:36px;
                          font-size:13px;font-weight:800;color:#4ecdc4;
                          font-family:Arial,Helvetica,sans-serif;">1</div>
            </td>
            <td style="padding:15px 18px 15px 8px;vertical-align:middle;">
              <p style="margin:0 0 3px;font-size:13px;font-weight:700;color:#ffffff;
                        font-family:Arial,Helvetica,sans-serif;">Review</p>
              <p style="margin:0;font-size:12px;color:rgba(255,255,255,0.48);
                        line-height:1.7;font-family:Arial,Helvetica,sans-serif;">
                Our team carefully reviews your enquiry.
              </p>
            </td>
          </tr>
        </table>

        <!-- Step 2 -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="margin-bottom:10px;
                      background:rgba(78,205,196,0.04);
                      border:1px solid rgba(78,205,196,0.12);border-radius:10px;">
          <tr>
            <td style="padding:15px 18px;width:54px;vertical-align:middle;">
              <div style="width:36px;height:36px;border-radius:50%;
                          background:rgba(78,205,196,0.15);
                          border:1px solid rgba(78,205,196,0.4);
                          text-align:center;line-height:36px;
                          font-size:13px;font-weight:800;color:#4ecdc4;
                          font-family:Arial,Helvetica,sans-serif;">2</div>
            </td>
            <td style="padding:15px 18px 15px 8px;vertical-align:middle;">
              <p style="margin:0 0 3px;font-size:13px;font-weight:700;color:#ffffff;
                        font-family:Arial,Helvetica,sans-serif;">Prepare</p>
              <p style="margin:0;font-size:12px;color:rgba(255,255,255,0.48);
                        line-height:1.7;font-family:Arial,Helvetica,sans-serif;">
                We prepare a personalised response tailored to you.
              </p>
            </td>
          </tr>
        </table>

        <!-- Step 3 -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="background:rgba(78,205,196,0.04);
                      border:1px solid rgba(78,205,196,0.12);border-radius:10px;">
          <tr>
            <td style="padding:15px 18px;width:54px;vertical-align:middle;">
              <div style="width:36px;height:36px;border-radius:50%;
                          background:rgba(78,205,196,0.15);
                          border:1px solid rgba(78,205,196,0.4);
                          text-align:center;line-height:36px;
                          font-size:13px;font-weight:800;color:#4ecdc4;
                          font-family:Arial,Helvetica,sans-serif;">3</div>
            </td>
            <td style="padding:15px 18px 15px 8px;vertical-align:middle;">
              <p style="margin:0 0 3px;font-size:13px;font-weight:700;color:#ffffff;
                        font-family:Arial,Helvetica,sans-serif;">Connect</p>
              <p style="margin:0;font-size:12px;color:rgba(255,255,255,0.48);
                        line-height:1.7;font-family:Arial,Helvetica,sans-serif;">
                We reach out to you by email or phone shortly.
              </p>
            </td>
          </tr>
        </table>

      </td>
    </tr>

    <!-- DIRECT CONTACT STRIP -->
    <tr>
      <td style="padding:18px 40px 8px;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="background:rgba(78,205,196,0.05);
                      border:1px solid rgba(78,205,196,0.12);border-radius:10px;">
          <tr>
            <td align="center" style="padding:16px 20px;">
              <p style="margin:0 0 7px;font-size:9px;letter-spacing:2.5px;
                        color:rgba(78,205,196,0.7);text-transform:uppercase;
                        font-family:Arial,Helvetica,sans-serif;">
                Reach us directly
              </p>
              <p style="margin:0;font-size:13px;color:rgba(255,255,255,0.72);
                        font-family:Arial,Helvetica,sans-serif;">
                &#128222;&nbsp;
                <a href="https://wa.link/lzcezh"
                   style="color:#4ecdc4;text-decoration:none;">+94 74 055 3769</a>
                &nbsp;&middot;&nbsp;
                &#9993;&nbsp;
                <a href="mailto:info@travelpartnerkanneliya.com"
                   style="color:#4ecdc4;text-decoration:none;">
                  info@travelpartnerkanneliya.com
                </a>
              </p>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <!-- DIVIDER -->
    <tr>
      <td style="padding:20px 40px 0;">
        <div style="height:1px;background:linear-gradient(to right,
                    transparent,rgba(78,205,196,0.22),transparent);"></div>
      </td>
    </tr>

    <!-- SOCIAL ICONS -->
    ' . socialIconRow($svg_facebook, $svg_whatsapp, $svg_tiktok) . '

    <!-- AUTOMATED EMAIL NOTE -->
    <tr>
      <td style="padding:0 40px 22px;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="background:rgba(255,193,7,0.05);
                      border:1px solid rgba(255,193,7,0.2);border-radius:8px;">
          <tr>
            <td style="padding:13px 18px;">
              <p style="margin:0;font-size:11px;color:rgba(255,220,80,0.65);
                        line-height:1.75;font-family:Arial,Helvetica,sans-serif;">
                <strong style="color:rgba(255,220,80,0.85);">&#9888; Automated Email:</strong>
                This is a system-generated confirmation email. Please do not reply
                directly to this message. To reach us, use the contact details
                listed above.
              </p>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <!-- FOOTER -->
    <tr>
      <td style="background:#071318;padding:20px 40px;text-align:center;
                 border-top:1px solid rgba(78,205,196,0.08);">
        <p style="margin:0 0 4px;font-size:12px;color:rgba(255,255,255,0.27);
                  font-family:Arial,Helvetica,sans-serif;">
          &copy; ' . date('Y') . ' Travel Partner Kanneliya &nbsp;&middot;&nbsp;
          Kanneliya Rain Forest, Galle, Sri Lanka
        </p>
        <p style="margin:0;font-size:11px;color:rgba(255,255,255,0.15);
                  font-family:Arial,Helvetica,sans-serif;">
          +94 74 055 3769 &nbsp;&middot;&nbsp; info@travelpartnerkanneliya.com
        </p>
      </td>
    </tr>

    ' . evonCredit() . '

  </table>

  </td></tr>
</table>

</body>
</html>';

        if (!$mail->send()) {
            echo 'Message Sent successfully';
        } else {
            echo 'Message Sent successfully';
        }

    } else {
        echo $errors[0];
    }
}
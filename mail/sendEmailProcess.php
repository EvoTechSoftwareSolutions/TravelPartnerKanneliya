<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/SMTP.php";
require __DIR__ . "/PHPMailer.php";
require __DIR__ . "/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

// ─── Input sanitizer ───────────────────────────────────────────────────────────
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// ─── Unicode icons (for buttons, badges, inline text only) ─────────────────────
$icon_check    = '&#10003;'; // ✓ Check
$icon_warning  = '&#9888;';  // ⚠ Warning
$icon_arrow    = '&#8617;';  // ↩ Reply
$icon_leaf     = '&#127807;'; // 🌿 Leaf

// ─── Image icons (for detail card left side) ───────────────────────────────────
$img_person   = 'https://travelpartnerkanneliya.com/_resource/img/mail/user.png';
$img_phone    = 'https://travelpartnerkanneliya.com/_resource/img/mail/phone.png';
$img_mail     = 'https://travelpartnerkanneliya.com/_resource/img/mail/mail.png';
$img_message  = 'https://travelpartnerkanneliya.com/_resource/img/mail/pen.png';

// ─── Social icons ──────────────────────────────────────────────────────────────
$svg_facebook = 'https://travelpartnerkanneliya.com/_resource/img/mail/facebook.png';
$svg_whatsapp = 'https://travelpartnerkanneliya.com/_resource/img/mail/whatsapp.png';
$svg_tiktok   = 'https://travelpartnerkanneliya.com/_resource/img/mail/tiktok.png';

// ─── Helper: image icon cell for detail cards ──────────────────────────────────
function iconCellImage($image_url, $alt = 'icon') {
    return '
      <td style="padding:16px 18px;width:56px;vertical-align:middle;">
        <div style="width:42px;height:42px;border-radius:10px;
                    background:rgba(78,205,196,0.1);
                    border:1px solid rgba(78,205,196,0.25);
                    text-align:center;line-height:42px;
                    display:inline-block;">
          <img src="' . $image_url . '" alt="' . $alt . '" 
               style="width:22px;height:22px;vertical-align:middle;
                      filter: brightness(0) saturate(100%) invert(77%) sepia(15%) saturate(1160%) hue-rotate(128deg) brightness(95%) contrast(92%);">
        </div>
      </td>';
}

// ─── Shared social icon row ─────────────────────────────────────────────────────
function socialIconRow($fb_svg, $wa_svg, $tt_svg) {
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
              <td style="padding:0 10px;">
                <a href="https://www.facebook.com/share/1Bs3cBNbkj/?mibextid=wwXIfr" target="_blank"
                   style="display:inline-block;width:44px;height:44px;border-radius:2rem;
                          background:transparent;
                          border:1px solid rgba(78,205,196,0.35);
                          text-align:center;line-height:44px;
                          text-decoration:none;vertical-align:middle;">
                  <img src="' . $fb_svg . '" alt="Facebook" style="width:20px;height:20px;vertical-align:middle;filter: brightness(0) saturate(100%) invert(77%) sepia(15%) saturate(1160%) hue-rotate(128deg) brightness(95%) contrast(92%);">
                </a>
              </td>
              <td style="padding:0 10px;">
                <a href="https://wa.link/lzcezh" target="_blank"
                   style="display:inline-block;width:44px;height:44px;border-radius:2rem;
                          background:transparent;
                          border:1px solid rgba(78,205,196,0.35);
                          text-align:center;line-height:44px;
                          text-decoration:none;vertical-align:middle;">
                  <img src="' . $wa_svg . '" alt="WhatsApp" style="width:20px;height:20px;vertical-align:middle;filter: brightness(0) saturate(100%) invert(77%) sepia(15%) saturate(1160%) hue-rotate(128deg) brightness(95%) contrast(92%);">
                </a>
              </td>
              <td style="padding:0 10px;">
                <a href="https://www.tiktok.com/@travelpartnerkanneliya?_r=1&_t=ZS-92JbmMsXzKm" target="_blank"
                   style="display:inline-block;width:44px;height:44px;border-radius:2rem;
                          background:transparent;
                          border:1px solid rgba(78,205,196,0.35);
                          text-align:center;line-height:44px;
                          text-decoration:none;vertical-align:middle;">
                  <img src="' . $tt_svg . '" alt="TikTok" style="width:20px;height:20px;vertical-align:middle;filter: brightness(0) saturate(100%) invert(77%) sepia(15%) saturate(1160%) hue-rotate(128deg) brightness(95%) contrast(92%);">
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
        $mail->Username   = 'kawarjanagunasekara@gmail.com';
        $mail->Password   = 'itjjycrgcaiocdmf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';
        $mail->setFrom('kawarjanagunasekara@gmail.com', 'Travel Partner Kanneliya');
        $mail->addReplyTo($email, $fname . ' ' . $lname);

        // ════════════════════════════════════════════════════════════════════════
        //  EMAIL 1 — OWNER NOTIFICATION
        // ════════════════════════════════════════════════════════════════════════
        $mail->addAddress('chadina9@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = '=?UTF-8?B?' . base64_encode('New Enquiry — ' . $fname . ' ' . $lname) . '?=';

        $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>New Enquiry</title>
</head>
<body style="margin:0;padding:0;background:transparent;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:transparent;padding:48px 0;">
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
            ' . iconCellImage($img_person, 'User') . '
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
            ' . iconCellImage($img_phone, 'Phone') . '
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
            ' . iconCellImage($img_mail, 'Email') . '
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
            ' . iconCellImage($img_message, 'Message') . '
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
          ' . $icon_arrow . '&nbsp; Reply to ' . $fname . '
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
        $mail->addReplyTo('chadina9@gmail.com', 'Travel Partner Kanneliya');
        $mail->Subject = 'We received your message — Travel Partner Kanneliya';

        $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Thank You</title>
</head>
<body style="margin:0;padding:0;background:transparent;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:transparent;padding:48px 0;">
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

        <!-- Leaf icon -->
        <div style="display:inline-block;width:66px;height:66px;border-radius:50%;
                    background:rgba(78,205,196,0.12);
                    border:1.5px solid rgba(78,205,196,0.45);
                    text-align:center;line-height:66px;
                    margin-bottom:18px;
                    color:#4ecdc4;font-size:32px;">
          ' . $icon_leaf . '
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
          ' . $icon_check . '&nbsp; Message Received
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
              <p style="margin:0 0 10px;font-size:9px;letter-spacing:2.5px;
                        color:rgba(78,205,196,0.7);text-transform:uppercase;
                        font-family:Arial,Helvetica,sans-serif;">
                Reach us directly
              </p>
              <p style="margin:0 0 6px;font-size:13px;color:#4ecdc4;
                        font-family:Arial,Helvetica,sans-serif;">
                <span style="color:rgba(78,205,196,0.6);">&#9656;</span> 
                <a href="https://wa.link/lzcezh" style="color:#4ecdc4;text-decoration:none;">+94 74 055 3769</a>
              </p>
              <p style="margin:0;font-size:13px;color:#4ecdc4;
                        font-family:Arial,Helvetica,sans-serif;">
                <span style="color:rgba(78,205,196,0.6);">&#9656;</span> 
                <a href="mailto:info@travelpartnerkanneliya.com" style="color:#4ecdc4;text-decoration:none;">info@travelpartnerkanneliya.com</a>
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
                <strong style="color:rgba(255,220,80,0.85);">' . $icon_warning . ' Automated Email:</strong>
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
            echo 'Failed to send: ' . $mail->ErrorInfo;
        } else {
            echo 'Message Sent successfully';
        }

    } else {
        echo $errors[0];
    }
}
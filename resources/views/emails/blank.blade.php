
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width">
    <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">
    <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title>
    <!-- The title tag shows in email notifications, like Android 4.4. -->
    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->
    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->
    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->
    <!-- Web Font / @font-face : END -->
    <!-- CSS Reset -->
    <style>
    /* What it does: Remove spaces around the email design added by some email clients. */
    /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */

    html,
    body {
        margin: 0 auto !important;
        padding: 0 !important;
        height: 100% !important;
        width: 100% !important;
    }
    /* What it does: Stops email clients resizing small text. */

    * {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }
    /* What is does: Centers email on Android 4.4 */

    div[style*="margin: 16px 0"] {
        margin: 0 !important;
    }
    /* What it does: Stops Outlook from adding extra spacing to tables. */

    table,
    td {
        mso-table-lspace: 0pt !important;
        mso-table-rspace: 0pt !important;
    }
    /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */

    table {
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        table-layout: fixed !important;
        margin: 0 auto !important;
    }

    table table table {
        table-layout: auto;
    }
    /* What it does: Uses a better rendering method when resizing images in IE. */

    img {
        -ms-interpolation-mode: bicubic;
    }
    /* What it does: A work-around for iOS meddling in triggered links. */

    *[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
    }
    /* What it does: A work-around for Gmail meddling in triggered links. */

    .x-gmail-data-detectors,
    .x-gmail-data-detectors *,
    .aBn {
        border-bottom: 0 !important;
        cursor: default !important;
    }
    /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */

    .a6S {
        display: none !important;
        opacity: 0.01 !important;
    }
    /* If the above doesn't work, add a .g-img class to any image in question. */

    img.g-img+div {
        display: none !important;
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
        /* iPhone 6 and 6+ */
        .email-container {
            min-width: 375px !important;
        }
    }
    </style>
    <!-- Progressive Enhancements -->
    <style>
    /* Media Queries */

    @media screen and (max-width: 600px) {
        .email-container {
            width: 100% !important;
            margin: auto !important;
        }
        /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
        .fluid {
            max-width: 100% !important;
            height: auto !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }
        /* What it does: Forces table cells into full-width rows. */
        .stack-column,
        .stack-column-center {
            display: block !important;
            width: 100% !important;
            max-width: 100% !important;
            direction: ltr !important;
        }
        /* And center justify these ones. */
        .stack-column-center {
            text-align: left !important;
        }
        /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
        .center-on-narrow {
            text-align: left !important;
            display: block !important;
            margin-left: auto !important;
            margin-right: auto !important;
            float: none !important;
        }
        table.center-on-narrow {
            display: inline-block !important;
        }
    }
    </style>
</head>
<body width="100%" bgcolor="#ececec" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
        <!-- Email Body : BEGIN -->
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td bgcolor="#ececec" height="10"></td>
            </tr>
            <tr>
                <td height="20" bgcolor="#ffffff"></td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" align="center" valign="top" width="100%">
                    <table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td width="100%" class="stack-column-center">
                              <table role="presentation" align="CENTER" border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tr>
                                      <td style="font-family: Trebuchet MS;color: #ffffff;" class="center-on-narrow">
                                          <img src="https://employmed.eu/images/header.jpg" width="600" height="" alt="EmployMed Newsletter" border="0" align="center" style="width: 100%; max-width: 600px;" class="g-img">
                                        </td>
                                  </tr>
                              </table>
                            </td>
                            <!-- Column : END -->
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" align="center" valign="top" width="100%">
                    <table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <!-- Column : BEGIN -->
                            <td width="100%" class="stack-column-center">
                                <table role="presentation" align="CENTER" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td width="20"></td>
                                        <td style="font-family: Trebuchet MS;color: #ffffff;" class="center-on-narrow">
                                            {!! $body !!}
                                        </td>
                                        <td width="20"></td>  
                                    </tr>
                                </table>
                            </td>
                            <!-- Column : END -->
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="20" bgcolor="#ffffff"></td>
            </tr>
            <tr>
                <td bgcolor="#ececec" height="10"></td>
            </tr>
        </table>
    </center>
</body>

</html>
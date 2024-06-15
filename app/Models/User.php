<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPMailer\PHPMailer\PHPMailer;
use Spatie\Permission\Traits\HasRoles;
use function Laravel\Prompts\error;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendPasswordResetNotification($token): void
    {
        $link='https://admin.clevers.co.ke/reset-password/'.$token;

        $mail='<!doctype html>
<html allow-viewer-render-template="" allow-xhr-interception="" amp4email="" report-errors-to-viewer="">
<head>
    <meta charset="utf-8">
    <style amp-runtime="" i-amphtml-version="012404021934000"></style>
    <meta content="frame-src \'none\'" http-equiv="Content-Security-Policy">
    <script async="" src="https://cdn.ampproject.org/rtv/012404021934000/v0.js"></script>
    <script async="" src="https://cdn.ampproject.org/rtv/012404021934000/v0/amp-viewer-integration-0.1.js"></script>
    <script async=""
            src="https://cdn.ampproject.org/rtv/012404021934000/v0/amp-viewer-integration-gmail-0.1.js"></script>
    <style amp-custom="">@media only screen and (min-width: 480px) {
        .mj-column-per-100 {
            width: 100%;
            max-width: 100%
        }
    }

    @media only screen and (max-width: 480px) {
        table.mj-full-width-mobile {
            width: 100%
        }

        td.mj-full-width-mobile {
            width: auto
        }
    }

    div p {
        margin: 0 0
    }

    h1, h2, h3, h4, h5, h6 {
        margin: 0
    }

    a {
        text-decoration: none
    }

    ol, ul {
        margin-top: 0;
        margin-bottom: 0;
        list-style-position: inside;
        padding-left: 0
    }

    figure.table {
        margin: 0
    }

    figure.table table {
        width: 100%
    }

    figure.table table td, figure.table table th {
        min-width: 2em;
        padding: .4em;
        border: 1px solid #bfbfbf
    }

    .hide-on-desktop {
        display: none
    }

    @media screen and (max-width: 480px) {
        .hide-on-desktop {
            display: revert
        }

        .hide-on-mobile {
            display: none
        }

        .mj-column-per-33 {
            padding: 4px 0 4px 0
        }

        .mj-sa-column-per-10 {
            width: 15%
        }

        .mj-sa-column-per-70 {
            width: 65%
        }
    }

    body {
        margin: 0;
        padding: 0
    }

    table, td {
        border-collapse: collapse
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: 0
    }

    p {
        display: block;
        margin: 13px 0
    }</style>
    <style amp4email-boilerplate="">body {
        visibility: hidden
    }</style>
</head>
<body style="word-spacing:normal;background-color:#f3f4f6">

<div style="background-color:#f3f4f6">
    <div style="background:#f3f4f6;background-color:#f3f4f6;margin:0 auto;max-width:600px">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="background:#f3f4f6;background-color:#f3f4f6;width:100%">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0;padding:0;padding-bottom:0;padding-left:20px;padding-right:20px;padding-top:0;text-align:center">
                    <div style="background:#f3f4f6;background-color:#f3f4f6;margin:0 auto;max-width:560px">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="background:#f3f4f6;background-color:#f3f4f6;width:100%">
                            <tbody>
                            <tr>
                                <td style="border:0 solid #1e293b;direction:ltr;font-size:0;padding:20px 0;padding-bottom:30px;padding-left:30px;padding-right:30px;padding-top:30px;text-align:center">
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               width="100%">
                                            <tbody>
                                            <tr>
                                                <td style="background-color:transparent;border:0 solid transparent;vertical-align:top;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center"
                                                                style="font-size:0;padding:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;word-break:break-word">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       role="presentation"
                                                                       style="border-collapse:collapse;border-spacing:0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="width:150px">
                                                                            <amp-img alt="Image" height="143"
                                                                                     layout="responsive"
                                                                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEucXzhSXEfq5EnBrgnbLpCkMiABCgXz6hU91He3ah-A&s"
                                                                                     style="border:0 solid #1e293b;border-radius:0;display:block;outline:0;text-decoration:none;width:100%;font-size:13px"
                                                                                     width="200"></amp-img>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="background:#fff;background-color:#fff;margin:0 auto;max-width:560px">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="background:#fff;background-color:#fff;width:100%">
                            <tbody>
                            <tr>
                                <td style="border:0 solid #0b213b;direction:ltr;font-size:0;padding:20px 0;padding-bottom:20px;padding-left:30px;padding-right:30px;padding-top:40px;text-align:center">
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="background-color:transparent;border:0 solid transparent;vertical-align:top"
                                               width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0;padding:0;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;word-break:break-word">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:collapse;border-spacing:0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:175px">
                                                                <amp-img alt="Image" height="456" layout="responsive"
                                                                         src="https://ci3.googleusercontent.com/meips/ADKq_NYGLYuNpPCv9kGeFRpR_cqrvSEjGkKGVMDEJ1EGxWZRyeJi7iDYeEalFe4-J1RmtVRyK2TUKqZCA8sBO1q58Ky7a4D5TU940nkrLUO1WZg34ZaPn3sTMuX3FBh6Zk_dkHC_UqBjnPeleuk1dZDrxXr3TLuAMYCrtKiMp9liJV287HQOKeCSyKJDRTZ0rZ6TwkoHN6b1yPKvnb_cUPu280yK_wGWKsrMvdAq=s0-d-e1-ft#https://img.mmdocdn.com/mailmodo/image/upload/v1658134862/editor/p/2c28dec6-c21c-4385-a91f-96e9a90c404f/af840cec2fb4c4a8d7ed0299db40f3ea_bwd6jy.png"
                                                                         style="border:0 solid #1e293b;border-radius:0;display:block;outline:0;text-decoration:none;width:100%;font-size:13px"
                                                                         width="456"></amp-img>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0;padding:10px 25px;padding-top:10px;padding-right:10px;padding-bottom:5px;padding-left:10px;word-break:break-word">
                                                    <div style="font-family:Helvetica;font-size:28px;font-weight:400;letter-spacing:0;line-height:1.5;text-align:left;color:#1e293b">
                                                        <p style="text-align:center"><span
                                                                style="color:#334155;font-size:30px"><strong>Reset your password</strong></span>
                                                        </p></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0;padding:10px 25px;padding-top:0;padding-right:10px;padding-bottom:20px;padding-left:10px;word-break:break-word">
                                                    <div style="font-family:Helvetica;font-size:16px;font-weight:400;letter-spacing:0;line-height:1.5;text-align:left;color:#1e293b">
                                                        <p style="text-align:center"><span style="color:#334155">We\'ve got a request from you to reset the password for your account. Please click on the button below to set a new password</span>
                                                        </p></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="font-size:0;padding:0;word-break:break-word">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:separate;width:auto;line-height:100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center" bgcolor="#45558E" role="presentation"
                                                                style="border-radius:4px;border:0 solid none;height:auto;background:#45558e;padding:16px 79px 16px 79px">
                                                                <div style="display:inline-block;background:#45558e;color:#fff;font-family:Helvetica;font-size:16px;font-weight:400;line-height:1;letter-spacing:1px;margin:0;text-decoration:none;text-transform:none;padding:0;border-radius:4px">
                                                                   <a href="'.$link.'"> <strong>Reset my password</strong></a></div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:0 0;font-size:0;word-break:break-word">
                                                    <div style="height:60px;line-height:60px"> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0;padding:10px 25px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;word-break:break-word">
                                                    <div style="font-family:Helvetica;font-size:16px;font-weight:400;letter-spacing:0;line-height:1.5;text-align:left;color:#1e293b">
                                                        <p><span
                                                                style="color:#334155"><strong>Questions?</strong></span><br><span
                                                                style="color:#334155">Please let us know if there\'s anything we can help you with by replying to this email or by emailing info@nic.ac.ke.</span>
                                                        </p></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="background:#fff;background-color:#fff;margin:0 auto;max-width:560px">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="background:#fff;background-color:#fff;width:100%">
                            <tbody>
                            <tr>
                                <td style="border:0 solid #1e293b;direction:ltr;font-size:0;padding:20px 0;padding-bottom:10px;padding-left:30px;padding-right:30px;padding-top:10px;text-align:center">
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="background-color:transparent;border:0 solid transparent;vertical-align:top"
                                               width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0;padding:10px 25px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;word-break:break-word">
                                                    <div style="font-family:Helvetica;font-size:16px;font-weight:400;letter-spacing:0;line-height:1.5;text-align:left;color:#1e293b">
                                                        <p><span style="color:#64748b;font-size:14px">If you didn\'t request a password reset, we recommend you get in touch with our support team and secure your account.</span>
                                                        </p>
                                                        <p><span style="color:#361ae2;font-size:14px"><strong>Call us at 0100360820 </strong></span><span
                                                                style="color:#64748b;font-size:14px">or write to us at </span><span
                                                                style="color:#361ae2;font-size:14px"><strong>info@nic.ac.ke</strong></span>
                                                        </p></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="background:#f3f4f6;background-color:#f3f4f6;margin:0 auto;max-width:560px">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="background:#f3f4f6;background-color:#f3f4f6;width:100%">
                            <tbody>
                            <tr>
                                <td style="border:0 solid #1e293b;direction:ltr;font-size:0;padding:20px 0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:20px;text-align:center">
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="background-color:transparent;border:0 solid transparent;vertical-align:top"
                                               width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="center"
                                                    style="background:#f3f4f6;font-size:0;padding:10px 25px;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;word-break:break-word">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation" style="float:none;display:inline-table">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:0 25px 0 25px;vertical-align:middle">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       role="presentation"
                                                                       style="border-radius:4px;width:24px">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="font-size:0;height:24px;vertical-align:middle;width:24px">
                                                                            <a href="https://web.facebook.com/NakuruInternationalCollege">
                                                                            <amp-img alt="Facebook" height="10"
                                                                                     layout="responsive"
                                                                                     src="https://web.facebook.com/cleverskenya.org"
                                                                                     style="border-radius:4px;display:block;width:100%"
                                                                                     width="10"></amp-img>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation" style="float:none;display:inline-table">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:0 25px 0 25px;vertical-align:middle">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       role="presentation"
                                                                       style="border-radius:4px;width:24px">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="font-size:0;height:24px;vertical-align:middle;width:24px">
                                                                            <a href="https://www.instagram.com/nakuruinternationalcollege/">

                                                                            <amp-img alt="Instagram" height="10"
                                                                                     layout="responsive"
                                                                                    src="https://web.facebook.com/cleverskenya.org"
                                                                                     style="border-radius:4px;display:block;width:100%"
                                                                                     width="10"></amp-img>
                                                                            </a>

                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation" style="float:none;display:inline-table">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:0 25px 0 25px;vertical-align:middle">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                       role="presentation"
                                                                       style="border-radius:4px;width:24px">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="font-size:0;height:24px;vertical-align:middle;width:24px">
                                                                            <a href="https://twitter.com/nic_nakuru">

                                                                            <amp-img alt="Twitter" height="10"
                                                                                     layout="responsive"
                                                                                     src="https://web.facebook.com/cleverskenya.org"
                                                                                      style="border-radius:4px;display:block;width:100%"
                                                                                     width="10"></amp-img>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0;padding:10px 25px;padding-top:0;padding-right:0;padding-bottom:24px;padding-left:0;word-break:break-word">
                                                    <div style="font-family:Helvetica;font-size:16px;font-weight:400;letter-spacing:0;line-height:1.5;text-align:left;color:#1e293b">
                                                        <p style="text-align:center"><span
                                                                style="color:#64748b;font-size:12px">Copyright ©️ '.date("Y").'  | CLEVERS	INSTITUTE	OF	PROFESSIONAL	STUDIES | All rights reserved</span>
                                                        </p></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<table align="center" style="font-family:\'Open Sans\';max-width:600px;margin:0 auto" width="100%">
    <tbody>
    <tr>
        <td align="left" width="50%">
            <a  href="https://nic.ac.ke/mailing/unsubscribe"
               rel="noreferrer noopener"
               style="margin-left:10px;margin-right:5px;color:grey;font-size:10px;text-decoration:underline"
               target="_blank">Unsubscribe</a>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>';

       $mailer=new PHPMailer();
       $mailer->isHTML();
       $mailer->setFrom('support@nic.ac.ke','Nakuru International College');
       $mailer->addAddress($this->email);
       $mailer->Body=$mail;
       $mailer->send();
       $mailer->clearAddresses();
    }
}

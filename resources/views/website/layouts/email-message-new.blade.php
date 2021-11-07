{{--
<h3>Name: {{$name}}</h3>
<div>
    {{$body_message}}
</div>
<p>sent via {{$email}}</p>

--}}
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html ><head>

    <!—[if gte mso 9]><xml>

        <o:OfficeDocumentSettings>

            <o:AllowPNG/>

            {{--<o:PixelsPerInch>96</o:PixelsPerInch>--}}

        </o:OfficeDocumentSettings>

    </xml><![endif]—>

    <title>Christmas Email template</title>

    <meta http–equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http–equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">

    <meta name="format-detection" content="telephone=no">

    <!—[if !mso]><!—>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!—<![endif]—>

    <style type="text/css">

        body {

            margin: 0 !important;

            padding: 0 !important;

            -webkit-text-size-adjust: 100% !important;

            -ms-text-size-adjust: 100% !important;

            -webkit-font-smoothing: antialiased !important;

        }

        img {

            border: 0 !important;

            outline: none !important;

        }

        p {

            Margin: 0px !important;

            Padding: 0px !important;

        }

        table {

            border-collapse: collapse;

            mso-table-lspace: 0px;

            mso-table-rspace: 0px;

        }

        td, a, span {

            border-collapse: collapse;

            mso-line-height-rule: exactly;

        }

        .ExternalClass * {

            line-height: 100%;

        }

        .em_defaultlink a {

            color: inherit !important;

            text-decoration: none !important;

        }

        span.MsoHyperlink {

            mso-style-priority: 99;

            color: inherit;

        }

        span.MsoHyperlinkFollowed {

            mso-style-priority: 99;

            color: inherit;

        }

        @media only screen and (min-width:481px) and (max-width:699px) {

            .em_main_table {

                width: 100% !important;

            }

            .em_wrapper {

                width: 100% !important;

            }

            .em_hide {

                display: none !important;

            }

            .em_img {

                width: 100% !important;

                height: auto !important;

            }

            .em_h20 {

                height: 20px !important;

            }

            .em_padd {

                padding: 20px 10px !important;

            }

        }

        @media screen and (max-width: 480px) {

            .em_main_table {

                width: 100% !important;

            }

            .em_wrapper {

                width: 100% !important;

            }

            .em_hide {

                display: none !important;

            }

            .em_img {

                width: 100% !important;

                height: auto !important;

            }

            .em_h20 {

                height: 20px !important;

            }

            .em_padd {

                padding: 20px 10px !important;

            }

            .em_text1 {

                font-size: 16px !important;

                line-height: 24px !important;

            }

            u + .em_body .em_full_wrap {

                width: 100% !important;

                width: 100vw !important;

            }

        }

    </style>

</head>



<body class="em_body" style="margin:0px; padding:0px;" bgcolor="#efefef">

<table class="em_full_wrap" valign="top" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">

    <tbody><tr>

        <td valign="top" align="center"><table class="em_main_table" style="width:700px;" width="700" cellspacing="0" cellpadding="0" border="0" align="center">

                <!—Header section—>

                <tbody><tr>

                    <td style="padding:15px;" class="em_padd" valign="top" bgcolor="#f6f7f8" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

                            <tbody>
                            <tr>

                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:12px; line-height:15px; color:#0d1121;" valign="top" align="center">Visit Us | <a href="{{url("/")}}" target="_blank" style="color:#0d1121; text-decoration:underline;">View Online</a></td>

                            </tr>

                            </tbody>
                        </table>
                    </td>

                </tr>

                <!—//Header section–>

                <!—Banner section—>

                <tr>

                    <td valign="top" align="center">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

                            <tbody>
                            <tr>

                                {{--
                                                                <td valign="top" align="center"><img class="em_img" alt="merry Christmas" style="display:block; font-family:Arial, sans-serif; font-size:30px; line-height:34px; color:#000000;height:100px; max-width:700px;" src="{{assetPath($setting->image->path)}}" width="700" border="0" height="345"></td>
                                --}}

                                <span style="font-family:'Open Sans', Arial, sans-serif; font-size:16px;font-weight:bold; line-height:30px; color:#000;" valign="top" align="center">
                                    {{website_title()}}
                                </span>
                            </tr>

                            </tbody>
                        </table>
                    </td>

                </tr>

                <!—//Banner section–>

                <!—Content Text Section—>

                <tr>

                    <td style="padding:35px 70px 30px;" class="em_padd" valign="top" bgcolor="#0d1121" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

                            <tbody>
                            <tr>

                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:30px; color:#ffffff;" valign="top" align="center">
                                    {{$title}}
                                    {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}
                                </td>

                            </tr>

                            <tr>

                                <td style="font-size:0px; line-height:0px; height:15px;" height="15">&nbsp;</td>

                                <!——this is space of 15px to separate two paragraphs ——>

                            </tr>

                            <tr>

                                <td style=" font-size:18px; line-height:22px; color:#fbeb59; letter-spacing:2px; padding-bottom:12px;" valign="top" align="center">
                                    {{$body_message}}
                                    {{---Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    -Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    -Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    -Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}

                                </td>

                            </tr>

                            <tr>

                                <td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>

                                <!——this is space of 25px to separate two paragraphs ——>

                            </tr>

                            <tr>

                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; line-height:22px; color:#fff; text-transform:uppercase; letter-spacing:2px; padding-bottom:12px;" valign="top" align="center"> Name:{{$name}} {{--mahmoud gad--}}</td>

                            </tr>
                            <tr>
                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; line-height:22px; color:#fff; letter-spacing:2px; padding-bottom:12px;" valign="top" align="center"> Email:{{$email}} {{--mahmoudgad672@gg.com--}} </td>
                            </tr>
                            <tr>
                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; line-height:22px; color:#fff; text-transform:uppercase; letter-spacing:2px; padding-bottom:12px;" valign="top" align="center"> Phone:{{$phone}} {{--01111111111--}}</td>

                            </tr>
                            <tr>
                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; line-height:22px; color:#fff; text-transform:uppercase; letter-spacing:2px; padding-bottom:12px;" valign="top" align="center"> Service:{{$service}} </td>

                            </tr>
                            @if($monthly_orders)
                                <tr>
                                    <td style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; line-height:22px; color:#fff; text-transform:uppercase; letter-spacing:2px; padding-bottom:12px;" valign="top" align="center"> Monthly Orders:{{$monthly_orders}} </td>

                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </td>

                </tr>



                <!—//Content Text Section–>

                <!—Footer Section—>

                <tr>

                    <td style="padding:38px 30px;" class="em_padd" valign="top" bgcolor="#f6f7f8" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

                            <tbody><tr>

                                <td style="padding-bottom:16px;" valign="top" align="center"><table cellspacing="0" cellpadding="0" border="0" align="center">

                                        <tbody>
                                        <tr>

                                            <td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="dashboard/img/icons/icon_logo_facebook.png" alt="fb" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;" width="26" border="0" height="26"></a></td>

                                            <td style="width:6px;" width="6">&nbsp;</td>

                                            <td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="dashboard/img/icons/icon_logo_twitter.png" alt="tw" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:27px;" width="27" border="0" height="26"></a></td>

                                            <td style="width:6px;" width="6">&nbsp;</td>

                                            <td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="dashboard/img/icons/icon_logo_youtube.png" alt="yt" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;" width="26" border="0" height="26"></a></td>

                                        </tr>

                                        </tbody>
                                    </table>
                                </td>

                            </tr>

                            <tr>

                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:11px; line-height:18px; color:#999999;" valign="top" align="center"><a href="#" target="_blank" style="color:#999999; text-decoration:underline;">PRIVACY STATEMENT</a> | <a href="#" target="_blank" style="color:#999999; text-decoration:underline;">TERMS OF SERVICE</a> | <a href="{{url("/")}}" target="_blank" style="color:#999999; text-decoration:underline;">RETURNS</a><br>

                                    © 2020 Be-Group. All Rights Reserved.<br>

                                    {{--If you do not wish to receive any further emails from us, please
                                    <a href="#" target="_blank" style="text-decoration:none; color:#999999;">unsubscribe</a>--}}
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </td>

                </tr>

                <tr>

                    <td class="em_hide" style="line-height:1px;min-width:700px;background-color:#ffffff;"><img alt="" src="images/spacer.gif" style="max-height:1px; min-height:1px; display:block; width:700px; min-width:700px;" width="700" border="0" height="1"></td>

                </tr>

                </tbody>
            </table>
        </td>

    </tr>

    </tbody>
</table>

<div class="em_hide" style="white-space: nowrap; display: none; font-size:0px; line-height:0px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

</body></html>

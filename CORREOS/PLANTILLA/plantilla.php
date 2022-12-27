<?php

require_once('../../mysql/conexion.php');

function getPlantilla($viaje, $placas)
{
    $responsiva = '';

    $cn = conectar();
    $sqlSelect = "SELECT ID, LATITUD, LONGITUD, REFERENCIA, VELOCIDAD, FECHA_HORA FROM UBICACIONES WHERE PLACAS = '$placas' ORDER BY FECHA_HORA DESC LIMIT 1";
    $resultSet = $cn->query($sqlSelect);

    if ($resultSet->num_rows > 0) {
        while ($row = $resultSet->fetch_assoc()) {
            if ($row['VELOCIDAD'] <= 0) {
                $estado = 'DETENIDO';
            } else {
                $estado = 'En Ruta';
            }

            $responsiva = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
            
            <head>
                <!--[if gte mso 9]>
                            <xml>
                                <o:OfficeDocumentSettings>
                                <o:AllowPNG/>
                                <o:PixelsPerInch>96</o:PixelsPerInch>
                                </o:OfficeDocumentSettings>
                            </xml>
                            <![endif]-->
                <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
                <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
                <meta http-equiv='X-UA-Compatible' content='IE=edge' />
                <meta name='format-detection' content='date=no' />
                <meta name='format-detection' content='address=no' />
                <meta name='format-detection' content='telephone=no' />
                <meta name='x-apple-disable-message-reformatting' />
                <!--[if !mso]><!-->
                <link href='https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i' rel='stylesheet' />
                <!--<![endif]-->
                <title>Email Template</title>
                <!--[if gte mso 9]>
                            <style type='text/css' media='all'>
                                sup { font-size: 100% !important; }
                            </style>
                            <![endif]-->
            
            
                <style type='text/css' media='screen'>
                    /* Linked Styles */
                    
                    a {
                        border: 0;
                        outline: none;
                    }
                    
                    a img {
                        border: none;
                    }
                    /* General styling */
                    
                    td,
                    h1,
                    h2,
                    h3 {
                        font-family: Helvetica, Arial, sans-serif;
                        font-weight: 400;
                    }
                    
                    td {
                        font-size: 13px;
                        line-height: 150%;
                    }
                    
                    body {
                        -webkit-font-smoothing: antialiased;
                        -webkit-text-size-adjust: none;
                        width: 100%;
                        height: 100%;
                        color: #37302d;
                        background: #ffffff;
                    }
                    
                    table {
                        border-collapse: collapse !important;
                    }
                    
                    h1,
                    h2,
                    h3 {
                        padding: 0;
                        margin: 0;
                        color: #444444;
                        font-weight: 400;
                        line-height: 110%;
                    }
                    
                    h1 {
                        font-size: 35px;
                    }
                    
                    h2 {
                        font-size: 30px;
                    }
                    
                    h3 {
                        font-size: 24px;
                    }
                    
                    h4 {
                        font-size: 18px;
                        font-weight: normal;
                    }
                    
                    .important-font {
                        color: #21BEB4;
                        font-weight: bold;
                    }
                    
                    .hide {
                        display: none !important;
                    }
                    
                    .force-full-width {
                        width: 100% !important;
                    }
                    
                    body {
                        padding: 0 !important;
                        margin: 0 !important;
                        display: block !important;
                        min-width: 100% !important;
                        width: 100% !important;
                        background: #001f51;
                        -webkit-text-size-adjust: none
                    }
                    
                    a {
                        color: #000001;
                        text-decoration: none
                    }
                    
                    p {
                        padding: 0 !important;
                        margin: 0 !important
                    }
                    
                    img {
                        -ms-interpolation-mode: bicubic;
                        /* Allow smoother rendering of resized image in Internet Explorer */
                    }
                    
                    .mcnPreviewText {
                        display: none !important;
                    }
                    /* Mobile styles */
                    
                    @media only screen and (max-device-width: 480px),
                    only screen and (max-width: 480px) {
                        .mobile-shell {
                            width: 100% !important;
                            min-width: 100% !important;
                        }
                        .bg {
                            background-size: 100% auto !important;
                            -webkit-background-size: 100% auto !important;
                        }
                        .text-header,
                        .m-center {
                            text-align: center !important;
                        }
                        .center {
                            margin: 0 auto !important;
                        }
                        .container {
                            padding: 20px 10px !important
                        }
                        .td {
                            width: 100% !important;
                            min-width: 100% !important;
                        }
                        .m-br-15 {
                            height: 15px !important;
                        }
                        .p30-15 {
                            padding: 30px 15px !important;
                        }
                        .p0-15-30 {
                            padding: 0px 15px 30px 15px !important;
                        }
                        .mpb30 {
                            padding-bottom: 30px !important;
                        }
                        .m-td,
                        .m-hide {
                            display: none !important;
                            width: 0 !important;
                            height: 0 !important;
                            font-size: 0 !important;
                            line-height: 0 !important;
                            min-height: 0 !important;
                        }
                        .m-block {
                            display: block !important;
                        }
                        .fluid-img img {
                            width: 100% !important;
                            max-width: 100% !important;
                            height: auto !important;
                        }
                        .column,
                        .column-dir,
                        .column-top,
                        .column-empty,
                        .column-empty2,
                        .column-dir-top {
                            float: left !important;
                            width: 100% !important;
                            display: block !important;
                        }
                        .column-empty {
                            padding-bottom: 30px !important;
                        }
                        .column-empty2 {
                            padding-bottom: 10px !important;
                        }
                        .content-spacing {
                            width: 15px !important;
                        }
                    }
                </style>
            </head>
            
            <body class='body' style='padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#001f51; -webkit-text-size-adjust:none;'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#001f51'>
                    <tr>
                        <td align='center' valign='top'>
                            <table width='650' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                                <tr>
                                    <td class='td container' style='width:650px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:55px 0px;'>
                                        <!-- Header -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td class='p30-15 tbrr' style='padding: 30px; border-radius:12px 12px 0px 0px;' bgcolor='#ffffff'>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <th class='column-top' width='145' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;'>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='img m-center' style='font-size:0pt; line-height:0pt; text-align:center;'><img src='https://phi-cargo.com/wp-content/uploads/2021/05/logo-phicargo-vertical-480x165.png' width='276' height='100' border='0' alt='' /></td>
                                                                    </tr>
                                                                </table>
                                                            </th>
            
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
            
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td class='fluid-img' style='font-size:0pt; line-height:0pt; text-align:left;'><img src='https://phi-cargo.com/wp-content/uploads/2022/02/Grua-y-contenedores-scaled.jpg' border='0' width='750' height='566' alt='' /></td>
                                            </tr>
                                        </table>
            
            
            
            
            
                                        <table cellspacing='0' cellpadding='0' width='100%'>
                                            <tr>
                                                <td style='background:#ffffff' width='100%'>
                                                    <center>
                                                        <table cellspacing='0' cellpadding='0' width='600' class='w320'>
                                                            <tr>
                                                                <td valign='top' class='mobile-block mobile-no-padding-bottom mobile-center' width='270' style='background:#ffffff;padding:10px 10px 10px 20px;'>
                                                                    <a href='#' style='text-decoration:none;'>
                                                                        <img src='https://phi-cargo.com/wp-content/uploads/2021/05/logo-phicargo-vertical-480x165.png' width='192' height='70' alt='Phi Cargo' />
                                                                    </a>
                                                                </td>
                                                                <td valign='top' class='mobile-block mobile-center' width='270' style='background:#ffffff;padding:10px 15px 10px 10px'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' class='mobile-center-block' align='right'>
                                                                        <tr>
                                                                            <td style='padding-top:20px;font-size: 20px;'>
                                                                                <b>Status</b>
                                                                            </td>
            
            
            
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                </td>
                                            </tr>
            
                                            <tr>
                                                <td valign='top' style='background-color:#f8f8f8;border-bottom:1px solid #e7e7e7;'>
            
                                                    <center>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='600' class='w320' style='height:100%;'>
                                                            <tr>
                                                                <td valign='top' class='mobile-padding' style='padding:20px;'>
                                                                    <table cellspacing='0' cellpadding='0' width='100%'>
            
                                                                        <tr>
                                                                            <td style='padding-bottom:10px;font-size: 20px;'>
                                                                                <b>Actualizacion de Status</b>
                                                                            </td>
            
            
            
                                                                        </tr>
            
                                                                        <tr>
            
            
                                                                            <td style='padding-bottom:20px;font-size: 15px;'>
                                                                                <b>Referencia de Viaje: " . $viaje . "</b>
                                                                            </td>
            
            
                                                                        </tr>
            
                                                                        <tr>
                                                                            <td style='padding-right:20px'>
                                                                                <b>Latitud: </b>
                                                                            </td>
            
                                                                            <td>
                                                                                <b>Longitud:</b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='padding-bottom:15px; padding-right:20px; border-top:1px solid #E7E7E7; vertical-align:top; '>
                                                                            " . $row['LATITUD'] . "
                                                                            </td>
                                                                            <td style='padding-bottom:15px; border-top:1px solid #E7E7E7;'>
                                                                            " . $row['LONGITUD'] . "
                                                                            </td>
            
                                                                        </tr>
            
                                                                        <tr>
                                                                            <td style='padding-right:20px'>
                                                                                <b>Referencia: </b>
                                                                            </td>
            
            
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='padding-bottom:15px; padding-right:20px; border-top:1px solid #E7E7E7; vertical-align:top; '>
                                                                            " . $row['REFERENCIA'] . "
                                                                            </td>
            
            
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='padding-right:20px'>
                                                                                <b>Estado: </b>
                                                                            </td>
            
                                                                            <td>
                                                                                <b>Fecha y hora: </b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='padding-top:5px; padding-right:20px; border-top:1px solid #E7E7E7; vertical-align:top; '>
                                                                            " . $estado . "

                                                                            </td>
                                                                            <td style='padding-bottom:52px; border-top:55px'>
                                                                            " . $row['FECHA_HORA'] . "

                                                                            </td>
            
                                                                        </tr>
            
                                                                        <tr>
            
                                                                            <td>
                                                                                <b>Veracruz </b>
                                                                            </td>
            
                                                                            <td>
                                                                                <b>Manzanillo</b>
                                                                            </td>
            
                                                                            <td>
                                                                                <b>Mexico</b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='padding-bottom:15px; padding-right:20px; border-top:1px solid #E7E7E7; vertical-align:top; '>
                                                                                Carr. Veracruz Cardel, km 13.5, Condado Valle Dorado, 91808 Veracruz
                                                                            </td>
                                                                            <td style='padding-bottom:15px; border-top:1px solid #E7E7E7; '>
                                                                                Carr. Manzanillo Minatitlan No. 2137, C.P, 28876 Col.
                                                                            </td>
                                                                            <td style='padding-bottom:15px; border-top:1px solid #E7E7E7; '>
                                                                                Calle 20 de Noviembre, Tezoyuca, Estado de Mexico
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='background-color:#b90000; '>
                                                    <center>
                                                        <table border='0 ' cellpadding='0 ' cellspacing='0 ' width='600 ' class='w320 ' style='height:100%;color:#ffffff ' bgcolor='#b90000 '>
                                                            <tr>
                                                                <td align='right ' valign='middle ' class='mobile-padding ' style='font-size:12px;padding:20px; background-color:#b90000; color:#ffffff; text-align:left; '>
                                                                    Agradecemos sus comentarios, quejas y sugerencias al correo,
                                                                    <a href='jcpalomo@phicargo.com'>jcpalomo@phicargo.com</a><br>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                </td>
                                            </tr>
            
            
            
                                            <!-- END Banner -->
            
                                            <!-- Footer -->
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                <tr>
                                                    <td class='p30-15 bbrr' style='padding: 50px 30px; border-radius:0px 0px 12px 12px;' bgcolor='#ffffff'>
                                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                            <tr>
                                                                <td></td>
            
                                                                <td align='center' style='padding-bottom: 30px;'>
                                                                    <table border='0' cellspacing='0' cellpadding='0'>
                                                                        <tr>
                                                                            <td class='img' width='55' style='font-size:0pt; line-height:0pt; text-align:left;'>
                                                                                <a href='#' target='_blank'><img src='https://img.icons8.com/color/512/facebook-new.png' width='34' height='34' border='0' alt='' /></a>
                                                                            </td>
                                                                            <td class='img' width='55' style='font-size:0pt; line-height:0pt; text-align:left;'>
                                                                                <a href='#' target='_blank'><img src='https://img.icons8.com/fluency/512/instagram-new.png' width='34' height='34' border='0' alt='' /></a>
                                                                            </td>
                                                                            <td class='img' width='55' style='font-size:0pt; line-height:0pt; text-align:left;'>
                                                                                <a href='#' target='_blank'><img src='https://img.icons8.com/fluency/512/internet.png' width='34' height='34' border='0' alt='' /></a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td></td>
            
                                                            </tr>
            
                                                            <tr>
                                                                <td></td>
                                                                <td class='text-footer1 pb10' style='color:#999999; font-family:helvetica; font-size:14px; line-height:20px; text-align:center; padding-bottom:10px;'>Transportes Belchez S.A. DE C.V.</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='text-footer2' style='color:#999999; font-family:helvetica; font-size:12px; line-height:26px; text-align:center;'>Carr. Veracruz Cardel, km 13.5, Condado Valle Dorado, 91808 Veracruz</td>
                                                                <td class='text-footer2' style='color:#999999; font-family:helvetica; font-size:12px; line-height:26px; text-align:center;'>Carr. Manzanillo – Minatitlan No. 2137, C.P, 28876 Col.</td>
                                                                <td class='text-footer2' style='color:#999999; font-family:helvetica; font-size:12px; line-height:26px; text-align:center;'>Calle 20 de Noviembre, Tezoyuca, Estado de México</td>
            
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class='text-footer3' style='padding: 40px 15px 0px; color:#425f8e; font-family:helvetica; font-size:12px; line-height:26px; text-align:center;'>
                                                        <a href='#' target='_blank' class='link-blue-u' style='color:#425f8e; text-decoration:underline;'><span class='link-blue-u' style='color:#425f8e; text-decoration:underline;'>Unsubscribe</span></a> from this
                                                        mailing list.
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                </tr>
                                </table>
                        </td>
                    </tr>
                    </table>
            </body>
            
            </html>";
        }
    }

    return $responsiva;
}

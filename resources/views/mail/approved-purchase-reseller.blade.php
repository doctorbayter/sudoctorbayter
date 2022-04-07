<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:500px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:0;background:#101010;">
              <img src="{{asset('img/mails/mail_dr_03.jpg')}}" alt="Bienvenido"  style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif; ">Hola! {{$user->name}} Tu pago ha sido confirmado</h1>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Quiero darte la bienvenida al <b>Programa Total Fitness, </b>tu compra ha sido aprobada con éxito y ahora tendrás acceso a toda la información que este plan incluye.</p>

                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://doctorbayter.com/plan" style="color:#a30000;text-decoration:underline;">👉 Entra aquí para <b>acceder a las recetas</b></a></p>

                    <p style="margin:0;margin-top:4px;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://doctorbayter.com/plan/total" style="color:#a30000;text-decoration:underline;">👉 Entra aquí para acceder al <b>plan de entrenamiento</b></a></p>

                    <p style="margin:0;margin-top:4px;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://wa.me/573172326835" style="color:#a30000;text-decoration:underline;">👉 Entra aquí para acceder al <b>grupo de WhatsApp</b></a></p>
                  </td>
                </tr>

                <tr>
                    <td class="esd-structure" align="left" style="padding-top:1rem;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-block-text " bgcolor="#eeeeee" align="left">
                                                        <table style="width: 500px;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="80%">
                                                                        <h4 style="padding-left: 1rem">Estos son tus datos de acceso</h4>
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
                    </td>
                </tr>
                <tr>
                    <td class="esd-structure  " align="left">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-block-text " align="left">
                                                        <table style="width: 500px;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 5px 10px 5px 0" width="80%" align="left">
                                                                        <p>{{$user->email}}</p>
                                                                    </td>
                                                                    <td style="padding: 5px 0" width="20%" align="left">
                                                                        <p>Contraseña: <b>{{$password}}</b></p>
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
                    </td>
                </tr>

                <tr>
                  <td style="padding-top:1rem;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="{{asset('img/mails/mail_tutorial.jpg')}}" alt="" width="260" style="height:auto;display:block;" /></p>
                          <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Aquí verás la lista de tutoriales para que aprendas todo lo que necesitas saber y no te pierdas ningún detalle.</p>
                          <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="{{route('plan.tutorial')}}" style="color:#a30000;text-decoration:underline;">Entra aquí al tutorial</a></p>
                        </td>
                        <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="{{asset('img/mails/mail_whatsapp.jpg')}}" alt="" width="260" style="height:auto;display:block;" /></p>
                          <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Nunca estarás solo, con mi acompañamiento en grupo entra ya al chat grupal vía WhatsApp.</p>
                          <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://wa.me/573172326835" style="color:#a30000;text-decoration:underline;">Entra aquí al chat</a></p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#a30000;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="left">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                      &reg; <b>Doctor Bayter</b> 2021<br/>
                    </p>
                  </td>
                  <td style="padding:0;width:50%;" align="right">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.facebook.com/doctorbayter" style="color:#ffffff;"><img src="{{asset('img/icons/rrss/facebook.svg')}}" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.instagram.com/doctorbayter" style="color:#ffffff;"><img src="{{asset('img/icons/rrss/instagram.svg')}}" alt="Instagram" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.youtube.com/doctorbayter" style="color:#ffffff;"><img src="{{asset('img/icons/rrss/youtube.svg')}}" alt="Youtube" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.tiktok.com/@doctorbayter" style="color:#ffffff;"><img src="{{asset('img/icons/rrss/tiktok.svg')}}" alt="TikTok" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
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
</html>

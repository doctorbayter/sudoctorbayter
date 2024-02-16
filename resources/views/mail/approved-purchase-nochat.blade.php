<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <title>Correo de Bienvenida Doctor Bayter</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ffffff; color: #333333; }
        .container { width: 100%; max-width: 650px; margin: auto; padding: 20px; }
        .content { text-align: left; font-size: 14px; line-height: 1.5; }
        .button { background-color: #a30000; color: #ffffff; padding: 15px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block; text-align: center; }
        .button:hover { background-color: #900; }
        ul { list-style-type: disc; margin-left: 40px; }
        li { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <p>Hola,</p>
            <p>Te doy la bienvenida al <strong>Método DKP</strong>.</p>
            <h2>¿Ahora qué debes hacer?</h2>
            <ul>
                <li>Ingresa a la página <a href="https://doctorbayter.com/plan" target="_blank">www.doctorbayter.com/plan</a> con TU CORREO y la CONTRASEÑA</li>
                @if ($library == true)
                <li>Al ingresar a la página te recomendamos ir a la <a href="https://doctorbayter.com/plan/biblioteca" target="_blank">Biblioteca de contenido</a> para que veas toda la información exclusiva a la que ahora tienes acceso por ser parte del Método DKP</li>
                @endif
                <li>Es importante que tengas en cuenta que el acceso al Método DKP lo tendrás por {{$time}} a partir de esta compra.</li>
            </ul>
            <p>Un fuerte abrazo,</p>
            <p><strong>Tu Doctor Bayter.</strong></p>
        </div>
    </div>
</body>
</html>

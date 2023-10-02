<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Notificación Importante</title>
</head>
<body>
    <table align="center" cellpadding="0" cellspacing="0" width="600">
        <tr>
            <td align="center" bgcolor="#0073e6" style="padding: 40px 0 30px 0;">
                <h1 style="color: #ffffff;">Notificación Importante</h1>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                <p>Estimado/a {{$name}},</p>
                <p>Queremos informarte acerca de que recibimos tu mensaje.</p>
                <p>{{$subject}}</p>
                <p>{{$mensaje}}</p>
                <p>Gracias por tu atención.</p>
                <p>Atentamente,</p>
                <p>Lince Store</p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0073e6" style="padding: 30px 30px 30px 30px;">
                <p style="color: #ffffff; text-align: center;">© 2023 Lince Store</p>
            </td>
        </tr>
    </table>
</body>
</html>

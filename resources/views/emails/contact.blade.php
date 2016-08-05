<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
<table>
    <tr>
        <td>
            <table>
                <tr>
                    <td>Adresse email du contact : {{ $email }}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Sujet : {{ $subject }}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Commentaire :</td>
                </tr>
                <tr>
                    <td>{{ $comment }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>




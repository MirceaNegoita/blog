<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form Message</title>
</head>
<body>
    <p>
        Subiect:  {{ $contact->subject }}
    </p>

    ---
    <p>Nume: {{ $contact->name }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Mesaj: {{ $contact->message }}</p>


</body>
</html>
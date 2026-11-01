<!DOCTYPE html>
<html>

<head>
    <title>Nytt kontaktmeddelande</title>
</head>

<body>
    <h2>Du har fått ett nytt meddelande via kontaktformuläret</h2>
    <p><strong>Namn:</strong> {{ $formData['name'] }}</p>
    <p><strong>E-post:</strong> {{ $formData['email'] }}</p>
    <p><strong>Meddelande:</strong></p>
    <p>{{ $formData['message'] }}</p>
</body>

</html>
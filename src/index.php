<!DOCTYPE html>
<html lang="en">
<head>
    <title>CodingBerlin Hands-on Meetup - ngrok Demo</title>
</head>
<body>

    <h1>ngrok Demo</h1>

    <p>
        Host:
        <?php echo $_SERVER['HTTP_HOST'] ?>
    </p>
    <p>
        <?php echo nl2br(print_r($_SERVER,1)) ?>
    </p>

</body>
</html>

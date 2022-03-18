<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <style type="text/css">
        body { background-color: #282a36; }
    </style>
</head>

<body>
    <form action="add_action.php" method="POST">
        <label>
            Name:<br>
            <input type="text" name="name">
        </label><br><br>

        <label>
            Email:<br />
            <input type="email" name="email">
        </label><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
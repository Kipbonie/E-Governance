<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600&display=swap');

        body {
            font-family: 'Noto Sans', sans-serif;
            padding: 2em 8em;
        }
    </style>
    <style type="text/css">
    body {
        margin:0px;
        padding:0px;
        font-family: sans-serif;
        font-size:.9em;
        background: url('t.jpg');
    }
    div {
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        -moz-transform: translate(-50%,-50%);
        -webkit-transform: translate(-50%,-50%);
        position:absolute;
        width:350px;
        background:#eee;
        padding:10px 20px;
        border-radius: 2px;
        box-shadow:0px 0px 10px #aaa;
        box-sizing:border-box;
    }
    input {
        display: inline-block;
        border: none;
        width:100%;
        border-radius:2px;
        margin:5px 0px;
        padding:7px;
        box-sizing: border-box;
        box-shadow: 0px 0px 2px #ccc;
    }
    #submit {
        border:none;
        background-color: blue;
        color:white;
        font-size:1em;
        box-shadow: 0px 0px 3px #777;
        padding:10px 0px;
    }
    span {
        color:red;
        font-size: 0.75em;
    }
    p {
        text-align: center;
        font-size: 1.75em;
    }
    a {
        text-decoration: none;
        color:blue;
        font-weight: bold;
    }
</style>
</head>

<body>

    <?php
    $db = "user_management";
    $conn = mysqli_connect("localhost", "root", "", $db);
    if (!$conn) {
        header("Location: http://localhost/kip?msg=Something went wrong, try again!&status=fail");
        die();
    }

    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $query = "select * from users where email = '$email'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        header("Location: http://localhost/kip?msg=Email or password wrong, try again!&status=fail");
        die();
    }

    
    $firstRow = mysqli_fetch_assoc($result);
    if (!$firstRow || strval($firstRow["password"]) != $pass) {
        header("Location: http://localhost/kip?msg=Email or password wrong, try again!&status=fail");
        die();
    }

    echo "<h2>Welcome, " . $firstRow["name"] . "</h2>";
    echo "<a href='/kip/Frameworks/select.php'>Continue</a>";
    ?>
</body>

</html>
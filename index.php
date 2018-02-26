<?php
session_start();
require "db/connect.php";

if (!empty($_SESSION["userType"])) {
    redirectToPage($_SESSION["userType"]);
}

$error = "";

if (!empty($_POST["username"]) || !empty($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $auth = loginUser($conn, $username, $password);

    if ($auth) {
        redirectToPage($_SESSION["userType"]);
    } else {
        $error = "<div class=\"alert alert-danger\" role=\"alert\"><b> Hmm... </b>Credential provided is invalid!</div>";
    }
}

function loginUser($conn, $username, $password) {
    $query = $conn->prepare("SELECT * FROM User WHERE user = :user;");
    $bind = array("user" => $username);

    $query->execute($bind);
    $result = $query->fetch();

    if ($result["user"] == $username && $result["pass"] == $password) {
        $_SESSION["userType"] = $result["type"];
        $_SESSION["userId"] = $result["id"];
        return true;
    }
    return false;
}

function redirectToPage($userType) {
    switch ($userType) {
        case "J":
            header("Location: rate/rate.php");
            break;
        case "A":
            header("Location: admin/admin.php");
            break;
        default:
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>StrITwise&reg; Judging System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2 class="form-signin-heading">StrITwise&reg;<br> Judging System</h2>

        <?php echo $error ?>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

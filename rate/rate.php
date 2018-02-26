<?php
session_start();
require "../db/connect.php";

if ($_SESSION["userType"] != "J") {
    header("Location: ../index.php");
}

$text = "";

if (!empty($_POST)) {
    $team = $_POST["team"];
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $q5 = $_POST["q5"];
    $total = $q1 + $q2 + $q3 + $q4;

    if ($q5 == "") {
        $q5 = null;
    }

    $query = $conn->prepare("INSERT INTO Judging (team_id, user_id, criteria1, criteria2, criteria3, 
criteria4, criteria5, total_point) VALUES (:team_id, :user_id, :q1, :q2, :q3, :q4, :q5, :total)");

    $bind = array("team_id" => $team,
        "user_id" => $_SESSION["userId"],
        "q1" => $q1,
        "q2" => $q2,
        "q3" => $q3,
        "q4" => $q4,
        "q5" => $q5,
        "total" => $total);

    $query->execute($bind);

    $text = "<div class=\"alert alert-success\" role=\"alert\"><b>Success!</b> Your entry for team " . $team .
        " have been recorded.</div>";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/custom/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">StrITwise&reg; Judging System - Team Judging</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Judging <span class="sr-only">(current)</span></a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Judging</h1>
            <?php echo $text ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-group">
                    <label for="team">Team Number</label>
                    <select class="form-control" name="team" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="team">Design & Effort</label>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1">Points</th>
                                <th class="col-md-11">Description</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>0 - 7</td>
                                <td>Minimum effort is made to utilized 3D modelling techniques animation methods into the video design.</td>
                            </tr>
                            <tr>
                                <td>8 - 15</td>
                                <td>Some effort is 3D modelling and animation are incorporated into the video design.</td>
                            </tr>
                            <tr>
                                <td>16 - 20</td>
                                <td>3D modelling techniques and animation are fully utilized into the video design.</td>
                            </tr>
                        </table>
                    </div>
                    <select class="form-control" name="q1" required>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="team">Originality & Creativity</label>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1">Points</th>
                                <th class="col-md-11">Description</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>0 - 7</td>
                                <td>Minimum to no effort made to inject creativity or originality in the story.</td>
                            </tr>
                            <tr>
                                <td>8 - 15</td>
                                <td>Attempts made to introduce creativity and originality in the animation of the story.</td>
                            </tr>
                            <tr>
                                <td>16 - 20</td>
                                <td>Demonstrate creativity and originality in the creation of the 3D models that enhances the animation of the story.</td>
                            </tr>
                        </table>
                    </div>
                    <select class="form-control" name="q2" required>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="team">Relevance</label>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1">Points</th>
                                <th class="col-md-11">Description</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>0 - 7</td>
                                <td>The video created has minimum relevance with the theme stated and elements of the fighter machine shows little to no similarity to the physical model built.</td>
                            </tr>
                            <tr>
                                <td>8 - 15</td>
                                <td>The video is relatable to the theme and elements of the fighter machine shows some similarity to the physical model built.</td>
                            </tr>
                            <tr>
                                <td>16 - 20</td>
                                <td>The video is totally relevant to the theme given.  Elements of the fighter machine shows close similarity to the physical model built.</td>
                            </tr>
                        </table>
                    </div>
                    <select class="form-control" name="q3" required>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="team">Engagement</label>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1">Points</th>
                                <th class="col-md-11">Description</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>0 - 7</td>
                                <td>The video is mostly flawed and poorly edited.</td>
                            </tr>
                            <tr>
                                <td>8 - 15</td>
                                <td>The video is somewhat engaging and visually acceptable.</td>
                            </tr>
                            <tr>
                                <td>16 - 20</td>
                                <td>The video is exceptional engaging and visually well told from start to finish.</td>
                            </tr>
                        </table>
                    </div>
                    <select class="form-control" name="q4" required>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Additional Remarks</label>
                    <textarea style="" type="text" class="form-control" name="q5" cols="50" rows="10" placeholder="If Any..."></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <!-- Form here -->
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>


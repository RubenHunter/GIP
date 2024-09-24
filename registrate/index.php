<?php
include "../connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<!--TEMPLATE: https://bootsnipp.com/snippets/dlZAN-->
<head>
    <title>Registrate</title>
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
<?php
$validPW = true;
$validUser = true;
$confirm = false;
$error = false;
$validEmail = true;
if (isset($_POST["submit"])) {
    $sql = "SELECT * FROM tblgebruikers";
    $resultaat = $mysqli->query($sql);

    $email = $_POST["email"];
    $firstName = $_POST["firstname"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $phonenumber = $_POST["phonenumber"];
    $mdPassword = md5($password);
    if ($password != $confirmPassword) {
        $validPW = false;
    } else {
        $test = false;
        while ($row = $resultaat->fetch_assoc()) {
            if ($row['voornaam'] == $_POST['firstname'] && $row['naam'] == $_POST['name']) {
                $test = true;
                $naam = true;

            }
            if ($row['email'] == $_POST['email']) {
                $validEmail = false;
                $test = true;
                $naam = false;
            }
        }
        if ($test) {
            if ($naam) {
                $validUser = false;
            } else {
                $validUser = true;
            }
        } else {
            if ($phonenumber == "") {
                $sql = "INSERT INTO tblgebruikers (naam, voornaam, email, wachtwoord) VALUES ('" . $name . "' ,'" . $firstName . "' ,'" . $email . "' ,'" . $mdPassword . "')";
                if ($mysqli->query($sql)) {
                    $confirm = true;
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                } else {
                    $error = true;
                }
            } else {
                $sql = "INSERT INTO tblgebruikers (naam, voornaam, email, wachtwoord, gsmnummer) VALUES ('" . $name . "' ,'" . $firstName . "' ,'" . $email . "' ,'" . $mdPassword . "' ,'" . $phonenumber . "')";
                if ($mysqli->query($sql)) {
                    $confirm = true;
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                } else {
                    $error = true;
                }
            }

        }
    }
}

?>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="images/bazlogo.png" alt=""/>
            <h3>Welcome</h3>
            <p>If you are registered you can login with this button</p>
            <form action="../login/index.php" method="post">
                <?php if ($confirm) {
                    print '
                        <input type="hidden" name="email" value=' . $_SESSION["email"] . '>
                        <input type="hidden" name="password" value=' . $_SESSION["password"] . '>
                        ';
                } else {
                    print '
                        <input type="hidden" name="email" value="0">
                        <input type="hidden" name="password" value="0">
                        ';
                } ?>
                <input type="submit" name="login" value="Login" id="login"/><br/>
            </form>
        </div>
        <div class="col-md-9 register-right" id="div">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Register your account</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <form action="index.php" method="post">
                                <div class="form-group">
                                    <label for="firstname">First Name<span style="color:#ff0000">*</span></label>
                                    <input type="text" id="firstname" class="form-control"
                                           value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : ''; ?>"
                                           pattern="[A-Za-z]+" name="firstname" required/>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name<span style="color:#ff0000">*</span></label>
                                    <input type="text" id="lastname" class="form-control"
                                           value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : ''; ?>"
                                           pattern="[A-Za-z]+" name="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail<span style="color:#ff0000">*</span></label>
                                    <input type="email" id="email" class="form-control"
                                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>"
                                           name="email" required/>
                                </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number">Phone number</label>
                                <input type="number" id="number" minlength="10" maxlength="10" name="phonenumber"
                                       class="form-control"
                                       value="<?php echo isset($_POST['phonenumber']) ? htmlspecialchars($_POST['phonenumber'], ENT_QUOTES) : ''; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="pw">Password<span style="color:#ff0000">*</span></label>
                                <input type="password" id="pw" class="form-control" value="" name="password" required/>
                            </div>
                            <div class="form-group">
                                <label for="cpw">Confirm Password<span style="color:#ff0000">*</span></label>
                                <input type="password" id="cpw" class="form-control" value="" name="confirmPassword"
                                       required/>
                            </div>
                            <?php
                            if (!$validPW) {
                                print "<a style='color: red'>Passwords aren't the same</a><br>";
                            }
                            if (!$validUser) {
                                print "<a style='color: red'>User name already exists</a><br>";
                            }
                            if ($confirm) {
                                print "<a style='color: #0DB8DE'>You have been successfully registered</a>";
                            }
                            if (!$validEmail) {
                                print "<a style='color: red'>This email is already in use</a><br>";
                            }
                            if ($error) {
                                print "<a style='color: red'>Something went wrong while processing your info</a>";
                                print "<br>";
                                print $sql;
                            }
                            ?>
                            <input type="submit" class="btnRegister" onclick="hide()" value="Register" name="submit"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

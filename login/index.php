<?php
    include "../connect.php";
    session_start();
    //als je al bent ingelogt naar de site sturen
    if (isset($_SESSION["gebruiker"])) {
    header('location:../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<!--TEMPLATE: https://www.bootstrapdash.com/product/free-bootstrap-login/#product-demo-section-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">
</head>
<body style="background-image: url('../images/background3.jpg')">
<?php
if (isset($_SESSION["reset"])){
    print "<script type='text/javascript'>
                            alert('You have succesfully resetted your password');
               </script>";
    //sessie variabele reset verwijderen zodat je dit bericht niet meer opnieuw krijgt als je terug naar login later gaat
    unset($_SESSION["reset"]);
}
if (isset($_SESSION["delete"])){
    print "<script type='text/javascript'>
                            alert('You have succesfully deleted your password');
               </script>";
    //sessie variabele reset verwijderen zodat je dit bericht niet meer opnieuw krijgt als je terug naar login later gaat
    unset($_SESSION["delete"]);
}
$validInfo = true;
if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    //SAFETY anders kan je SQL code beginnen schrijven
    $email = str_replace("'", "", $email);
    $password = str_replace("'", "", $password);
    $mdPassword = md5($password);

    $sql = "SELECT * FROM tblgebruikers WHERE email='" . $email . "' AND wachtwoord='" . $mdPassword . "'";
    //echo $sql;

    $resultaat = $mysqli->query($sql);
    if (!$resultaat = $mysqli->query($sql)) {
        print $mysqli->error;
    }
    if ($info = $resultaat->fetch_assoc()) {

        $gebruikerInfo = array();

        $fieldInfo = $resultaat->fetch_fields();
        foreach ($fieldInfo as $val) {
            if ($val->name != "wachtwoord") {
                $arr = array($val->name => $info[$val->name]);
                $gebruikerInfo = array_merge($gebruikerInfo, $arr);
            }
        }

        $_SESSION["gebruiker"] = $gebruikerInfo;
        //print_r($_SESSION["gebruiker"]) ;
        header("Location: ../index.php");



    }else{
        $validInfo = false;
    }
}
?>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="images/login2.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body" style="padding-top: 30px;">
              <div class="brand-wrapper">
                <img src="../images/BAZANDPOORT.png" alt="logo" class="logo" style="width: 50%; height: 30%">
              </div>
              <p class="login-card-description">Sign into your canteen account</p>
                <?php
                if(!$validInfo) {
                    print "<p style='color: red'>Wrong login data</p>";
                }
                ?>
              <form action="index.php" method="post" >
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <a href="../resetPW/form.php" class="forgot-password-link">Forgot password?</a>
                <p id="footerText"> Don't have an account? <a href="../registrate" class="text-reset">Register here</a></p>
                <form action="../admin/login.php">
                    <a href="../admin/login.php" class="text-reset">Login as admin.</a>
                <!--<input type="submit" name="admin" id="admin" class="btn btn-block login-btn mb-4" style="margin-bottom: 1px!important;" value="Login as admin" href="../admin/login">-->
                </form>
                <nav class="login-card-footer-nav">
                  <a href="https://www.privacypolicies.com/live/4b07cd66-e1c9-4e3a-ad9c-136fb2fc880a">Terms of use.</a>
                  <a href="https://www.privacypolicies.com/live/c60dd80a-b563-4730-a064-b0182a584f2d">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

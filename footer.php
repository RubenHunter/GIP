<?php
include "connect.php";
$sql ="SELECT * FROM tblgebruikers WHERE volgnummer='".$_SESSION["gebruiker"]["volgnummer"]."'";
$resultaat =$mysqli->query($sql);
$account =$resultaat->fetch_assoc();
?>

<div class="contact-imfo-box">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-volume-control-phone"></i>
                <div class="overflow-hidden">
                    <h4>Phone</h4>
                    <p class="lead">
                        +32 475 53 27 44
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="fa fa-envelope"></i>
                <div class="overflow-hidden">
                    <h4>Email</h4>
                    <p class="lead">
                        BAZcantine@gmail.com
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="fa fa-map-marker"></i>
                <div class="overflow-hidden">
                    <h4>Location</h4>
                    <p class="lead">
                        Zandpoortvest 9, 2800 Mechelen
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact info -->

<!-- Start Footer -->
<footer class="footer-area bg-f">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3>About Us</h3>
                <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Opening hours</h3>
                <p><span class="text-color">Mon-Tue: </span>11:AM - 4PM</p>
                <p><span class="text-color">Wednesday :</span> Closed</p>
                <p><span class="text-color">Thu-Fri :</span> 11:AM - 4PM</p>
                <p><span class="text-color">Sat-Sun :</span> Closed</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Contact information</h3>
                <p class="lead">Zandpoortvest 9, 2800 Mechelen</p>
                <p class="lead"><a href="#">+32 475 53 27 44</a></p>
                <p><a href="contact.php"> BAZcantine@gmail.com</a></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Subscribe</h3>
                <div class="subscribe_form">
                    <form class="subscribe_form" action="subscribe.php" method="post">
                        <input name="email" id="subs-email" class="form_input" value="<?php print $account["email"]?>" type="hidden">
                        <?php
                        if ($account["subscribed"] == 1){
                            print '<button type="submit" name="submit" class="submit">UNSUBSCRIBE</button>';
                        }else{
                            print '<button type="submit" name="submit" class="submit">SUBSCRIBE</button>';
                        }
                        ?>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <ul class="list-inline f-social">
                    <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100075630783323"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/BazCantine"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <!--<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="company-name">All Rights Reserved. &copy; 2021 - <script>document.write(new Date().getFullYear())</script> <a href="#">BAZcanteen </a> Design By :
                        <a href="https://www.free-css.com/">Free-css.com</a></p>
                </div>
            </div>
        </div>
    </div>

</footer>
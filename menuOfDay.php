<div class="menu-box">
    <div class="container text-center">
        <div class="col-lg-12">
            <h1 style="font-size: 2rem;"><?php print $message; ?></h1>
        </div>
    </div>

    <div class="container">
        <?php
        switch ($today) {
            case "Wednesday":
                $message = "The cantine is closed on Wednasdays!";
                break;
            case "Saturday":
            case "Sunday":
                $message = "The cantine is closed in the weekend!";
                break;
            default:
                //count = how many products there are on that day menu.
                $aantal = "SELECT COUNT(*) FROM menus WHERE dag ='" . $today . "'";
                $result = mysqli_query($mysqli, $aantal);
                $rows = mysqli_fetch_row($result);
                $amount = $rows[0];
                if ($amount == 0) {
                    print '
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Menu of ' . $today . '</h2>
                        <h1>Seems like this menu is yet to be made</h1>
                        <h3>Be sure to subscibe for any more info!</h3>
                    </div>
                </div>
            </div>
            ';
                } else {

                    print '
            <div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Menu of ' . $today . '</h2>
						<p>Buy your favorite food from our amazing menu here! </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".drinks">Drinks</button>
							<button data-filter=".lunch">Lunch</button>
							<button data-filter=".dinner">Dinner</button>
							<button data-filter=".desert">Dessert</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row special-list">
            ';

                    $sql = "SELECT * FROM menus WHERE dag='" . $today . "'";
                    $resultaat = $mysqli->query($sql);
                    while ($row = $resultaat->fetch_assoc()) {
                        $sql2 = "SELECT * FROM tblproduct where id='" . $row["product"] . "'";
                        $resultaat2 = $mysqli->query($sql2);

                        while ($row = $resultaat2->fetch_assoc()) {
                            if ($row["foto"] == "") {
                                $row["foto"] = "menuTemplate.png";
                            }
                            print '
                            <div class="col-lg-4 col-md-6 special-grid " style="position: relative;!important;" id=' . $row["id"] . '>
                                <div class="gallery-single fix">
                                    <img id="foto" src=uploads/' . $row["foto"] . ' class="img-fluid" style="min-width: 350px;" alt="Image">
                                    <div class="why-text" id="div">
                                    <form action="addCart.php" method="post">
                                        <h4>' . $row["naamproduct"] . '</h4>
                                        <p id="descriptie">' . $row["descriptie"] . '</p>
                                        
                                        <div class="underHR" style="clear: both">
                                        <h5 style="float: left">&#8364;' . $row["prijs"] . '</h5>
                                            <input type="hidden" name="id" value=' . $row["id"] . '>
                                           
                                            <div class="quantity" >
                                              <input type="number" name="quantiteit" min="1" max="9" step="1" value="1">
                                            </div>
                                         
                                            <button class="btn btn-lg btn-circle btn-outline-new-white" style="margin-left: 25px;border-color: #000000;color: black;padding-left:20px;padding-right: 20px;" type="submit" name="submit">Add to cart</button>
                                         </div>   
                                        </form>
                                    </div>
                                </div>
                            </div>';
                            switch ($row["sectie"]) {
                                case "drinks":
                                    print"<script type='text/javascript'>
                                                var element = document.getElementById('" . $row["id"] . "');
                                                element.classList.add('drinks')
                                          </script>";
                                    break;
                                case "lunch":
                                    print"<script type='text/javascript'>
                                                var element = document.getElementById('" . $row["id"] . "');
                                                element.classList.add('lunch')
                                          </script>";
                                    break;
                                case "maaltijd":
                                    print"<script type='text/javascript'>
                                                var element = document.getElementById('" . $row["id"] . "');
                                                element.classList.add('dinner')
                                          </script>";
                                    break;
                                case "desert":
                                    print"<script type='text/javascript'>
                                                var element = document.getElementById('" . $row["id"] . "');
                                                element.classList.add('desert')
                                          </script>";
                                    break;
                            }
                            print "<script type='text/javascript'>
                                //If the description is longer then 33karakters then make the img min-height 250px
                                //If the description is longer then 66karakters then make the img min-height 275px
                                //werkt nog niet
                                var img  = document.getElementById('" . $row["id"] . "').getElementsByTagName('img')[0];
                                var descriptie = '" . $row["descriptie"] . "';
                                var aantalKarakters = descriptie.length;
                                //console.log(aantalKarakters);
                                if (aantalKarakters > 40){
                                  img.classList.add('twoline');
                                  /*console.log('add class here');
                                  console.log('" . $row["id"] . "');
                                  console.log(img.classList);*/
                                } else if (aantalKarakters > 66){
                                    img.classList.add('threeline');
                                } 
                               
                                </script>";
                        }
                    }
                }
                break;
        }
        ?>
    </div>
</div>
</div>

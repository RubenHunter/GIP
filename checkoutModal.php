<!-- Modal TEMPLATE: http://www.freepsdhtml.com/100-best-examples-checkout-template-design-2018/ -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: black">Placing order</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div id="wrapper">
                    <div id="container">
                        <div id="left-col">
                            <div id="left-col-cont">
                                <h2>Summary</h2>
                                <?php
                                $sql3 = "SELECT * FROM tblwinkelwagen WHERE nr = '".$_SESSION["gebruiker"]["volgnummer"]."'";
                                $resultaat3 = $mysqli->query($sql3);
                                $_SESSION["cartId"] = array();
                                $_SESSION["cartQuantity"] = array();
                                $ids = array();
                                $Quantiteiten = array();
                                while ($row2 = $resultaat3->fetch_assoc()){

                                    $sql4 =  "SELECT * FROM tblproduct where id='" . $row2["productid"] . "'";
                                    $resultaat4 = $mysqli->query($sql4);

                                    while ($row3 = $resultaat4->fetch_assoc()){
                                        if ($row3["foto"] == ""){
                                            $row3["foto"] = "menuTemplate.png";
                                        }

                                        print '
                                            <div class="item">
                                            <input type="hidden" name="id" value='.$row3["id"].'>
                                            <input type="hidden" name="quantity" value='.$row2["quantiteit"].'>
                                        <div class="img-col">
                                            <img src=../uploads/' . $row3["foto"] . ' id=' . $row3["id"] . ' alt="" />
                                        </div>
                                        <br>
                                        <div class="meta-col">
                                            <h3>x'.$row2["quantiteit"].' '.$row3["naamproduct"].'</h3>
                                            <p class="price">$'.$row3["prijs"].'</p>
                                        </div>
                                    </div>
                                    
                                    
                                            ';

                                        $id = $row3["id"];
                                        $quantity = $row2["quantiteit"];
                                        array_push($ids, $id);
                                        array_push($Quantiteiten, $quantity);

                                    }
                                }


                                //Still have to check if code is already existing
                                $validCode = true;
                                $sql = "SELECT * FROM tblorders";
                                $resultaat = $mysqli->query($sql);
                                $sql2 = "SELECT COUNT(1) FROM tblorders";
                                $resultaat2 = $mysqli->query($sql2);
                                $row = mysqli_fetch_row($resultaat2);
                                if ($row[0] >= 1){
                                    while($validCode){
                                        $randomCode = str_pad(mt_rand(1,999999999),9,'0',STR_PAD_LEFT);
                                        while ($row = $resultaat->fetch_assoc()){
                                            if ($row["orderId"] == $randomCode){
                                                $validCode = true;
                                                break;
                                            }else{
                                                $validCode = false;
                                            }
                                        }
                                    }
                                }else{
                                    $randomCode = str_pad(mt_rand(1,999999999),9,'0',STR_PAD_LEFT);
                                }

                                $_SESSION["orderId"] = $randomCode;
                                $_SESSION["cartId"] = $ids;
                                $_SESSION["cartQuantity"] = $Quantiteiten;
                                $_SESSION["price"] = $prijs;

                                ?>
                                <p id="total">Total</p>
                                <h4 id="total-price"><span>€</span><?php print $prijs ?></h4>
                            </div>
                        </div>
                        <div id="right-col">
                            <h2 style="text-align: center">Payment & pick-up</h2>
                            <div id="logotype">
                                <img id="mastercard" src="http://emilcarlsson.se/assets/MasterCard_Logo.png" alt="" />
                            </div>

                            <form onsubmit="return ajaxgo()">

                                <label for="">OrderID</label>
                                <input id="orderId" type="text" value="<?php print"".$_SESSION["orderId"]."";?>" readonly/>
                                <div class="middle">
                                    <label for="">At what time do you want to pick your order up at the canteen?</label>
                                    <select name="hour" id="hour" style="color: black" size="1">
                                        <option value="Hour">Hour</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    <select name="minute" id="minute" style="color: black" size="1">
                                        <option value="Minute">Minute</option>
                                        <option value="00">00</option>
                                        <option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" id="timeSubmit" value="Set Time">
                                </div>
                            </form>

                                <!--<div class="right">
                                    <label id="cvc-label" for="">CVC <i class="fa fa-question-circle-o" aria-hidden="true"></i></label>
                                    <input id="cvc" type="text" placeholder="123" maxlength="3" />
                                </div>-->
                                <div style="margin-top: 50px">
                                    <?php
                                    include "buyButton.php";
                                    ?>
                                    <p id="noButtonText">Please select a time before ordering.</p>
                                    <!--<a id="bnp-6262aca64fef040004b69f74" class="bnp-button" href="http://bn.plus/0bQr5w"><span id="purchase">Order it now</span></a>-->
                                    <p id="support">Having problem with checkout? <a href="contact.php">Contact our support</a>.</p>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
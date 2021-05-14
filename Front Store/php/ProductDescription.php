<?php
session_start();
if ($_GET["destroy"] == "TRUE") { // destroy session when logout is clicked
  session_unset();
  session_destroy();
  echo "<script>alert('You have been logged out successfully');</script>";
  echo "<script>location='home.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title id="headTitle"></title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../Styles/navbar.css" />
  <link rel="stylesheet" href="../Styles/shopping-cart.css" />
  <link rel="stylesheet" href="../Styles/product-desc.css" />
  <style>

  </style>

  <link rel="stylesheet" href="../Styles/home.css" />

</head>

<body>


  <!-- NAVBAR -->
  <?php
  //include("../components/Home/front-header.html");
  include("header.php");
  ?>

  <div class="div1">
    <h1 class="h1" id="title">BAKERY </h1>

  </div>
  <!-- MAIN-CONTNET -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 wrapper">
        <div class="container" style="margin-top:30px">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
              <img id="image" alt="" class="img1">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 description">
              <h4 class="product-name" id="itemName"></h4>
              <h5 >Price : <span id="price"></span></h5> 
              <br />
              <br />
              <br />
              Quantity:
              <div class="box">
                <input type="number" value="0" id="quantity">
              </div>
              <br />
              <button type="button" class="btn btn-dark btn1 add-cart" onclick="add()"><i class="fas fa-shopping-cart fas"></i> ADD</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-3">
        <a href="Shopping-Cart.php"> <button type="button" class="btn btn-dark btn2" id="menu-toggle"><i class="fas fa-shopping-cart fas1"></i> SHOPPING CART <span class="cart-span">0</span></button> </a>
      </div>

    </div>
  </div>

  <div class="container-fluid mt-2 ml-3 accordion-container">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="more-description">More Description <i class="fas fa-arrow-down"></i> </a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body" id="description">The mild yet sweet flavour of the Gala apple has made it a family favourite for snacks, salads and sauces. The vibrant red mixes in with subtle hints of green to give the apple its unmistakable look.
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
      <div class="footer-items">
        <div class="footer-item"> 
          <p>Customer Care</p>
          <a href="mailto:hege@example.com">info@umarkt.com</a><br>
          <a class="foot-link"href="contactus.php">Contact us</a>
        
        </div>
        <div class="footer-item">
          <p>UMarkt Store</p>
          <a class="foot-link" href="../php/Aisle.php?aisle=fruits">Fruits and Vegetables</a>
          <a class="foot-link" href="../php/Aisle.php?aisle=bakery">Bakery</a>
          <a class="foot-link" href="../php/Aisle.php?aisle=butchery">Butchery</a> 
          <a class="foot-link" href="../php/Aisle.php?aisle=seafood">Seafood</a> 
        </div>
      </div>
   
    </footer>
    </body>

<?php

$xmlDoc = new DOMDocument();
$xmlDoc->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$id = $_GET["id"];
$item = $xmlDoc->getElementById($_GET["id"]);

?>

<script type="text/javascript">
  document.getElementById("headTitle").innerText = '<?php echo $item->getElementsByTagName("item")->item(0)->textContent; ?>';
  document.getElementById("title").innerText = '<?php
                                                $aisle =  $item->parentNode->getAttribute("id");
                                                switch ($aisle) {
                                                  case "BakeryList":
                                                    echo "Bakery";
                                                    break;
                                                  case "ButcheryList":
                                                    echo "Butchery";
                                                    break;
                                                  case "FrozenList":
                                                    echo "Frozen";
                                                    break;
                                                  case "FruitsList":
                                                    echo "Fruits and Vegetables";
                                                    break;
                                                  case "OthersList":
                                                    echo "Non-Grocery";
                                                    break;
                                                }
                                                ?>';
  
  document.getElementById("itemName").innerText = '<?php echo $item->getElementsByTagName("item")->item(0)->textContent; ?>';
  document.getElementById("image").src = '<?php echo $item->getElementsByTagName("image")->item(0)->textContent; ?>';
  document.getElementById("description").innerText = '<?php echo $item->getElementsByTagName("description")->item(0)->textContent; ?>';
  document.getElementById("price").innerText = '<?php echo $item->getElementsByTagName("price")->item(0)->textContent; ?>';
  function add(){
    
   
    window.location.href = "Shopping-Cart.php?id="+'<?php echo $id?>'+"&quantity="+document.getElementById("quantity").value;

  }
</script>

</html>
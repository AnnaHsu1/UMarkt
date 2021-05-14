<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title><?php
        switch ($_GET["aisle"]) {
            case "bakery":
                echo "Bakery";
                break;
            case "fruits":
                echo "Fruits & Vegetables";
                break;
            case "frozen":
                echo "Frozen";
                break;
            case "butchery":
                echo "Butchery";
                break;
            case "seafood":
                echo "Seafood";
                break;
            case "others":
                echo "Non-Grocery";
                break;
        }
        ?></title>
    <link rel="icon" href="../../Metadata/icon.svg">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Styles/home.css" />


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
      *{
        font-family: 'Montserrat', sans-serif;
      }

        /* PRODUCT DESCRIPTION */
        body {
            background-color: white;
        }

        .sidebar {

            margin-top: -4.2rem;
        }

        h3 {
            font-weight: 800;
            font-size: 1.4rem;
        }

        .main-content {
            margin-top: -5rem;
        }

        .categories {
            list-style-type: none;
            font-weight: 600;
            margin-left: 18px;

        }

        .list-group > a {
            color: black;
            text-decoration: none;

        }

        .list-group {
            margin-bottom: 20%;
        }


        .div1 {
            border: rgb(240, 238, 238) 15px solid;
            text-align: center;
            background: rgb(240, 238, 238);
            color: black;
            margin-top: 3%;
            margin-bottom: 6rem;

        }

        .h1 {
            font-size: 220%;
            font-weight: 700;
            color: rgb(80, 78, 78);
        }

        .cost {
            font-weight: bold;
            font-size: 1rem;
        }

        .btn {
            width: 10rem;
            text-align: center;
            font-size: 0.9rem;
            position: relative;
            left: 0.2px;
            margin-top: 4rem;
        }

        .card-text {
            font-size: 0.9rem;
            white-space: nowrap;
            overflow: hidden;
        }

        .price {
            border: 1px solid black;
            width: 70px;
            overflow: hidden;
            white-space: nowrap;
        }

        .gram {

            color: rgba(136, 136, 136, 0.609);
            position: relative;
            top: 65px;
        }

        .hr {
            list-style-type: none;
            border: none;
            height: 2px;
            background: black;
            margin-left: 18px;
        }

        .item-pic {
            width: 100%;
            height: 180px
        }
        #special{

            border: 5px dotted red;
            width: 15rem;
            height: 29rem;
            margin-top: 6.8%;
            margin-left: 20px;
            justify-content: center;

        }

        #card{

            border: 1px solid gray;
            width: 15rem;
            height: 29rem;
            margin-top: 6.8%;
            margin-left: 20px;
            justify-content: center;

        }

        .add-cart {
            position: absolute;
            bottom:   20px;
        }

        .test{
            position: relative;
        }
        #banner{
            position: absolute;
            top: 0px;
            background-color: yellow;
            width: 100%;
            text-align: center;
        }

    </style>

    <link rel="stylesheet" href="../Styles/navbar.css" />

</head>

<body>


<?php
include("header.php");
?>


<!-- PRODUCT DESCRIPTION -->
<div class="div1">
    <h1 class="h1">
        <?php
            switch ($_GET["aisle"]) {
                case "bakery":
                    echo "BAKERY";
                    break;
                case "fruits":
                    echo "FRUITS AND VEGETABLES";
                    break;
                case "frozen":
                    echo "FROZEN";
                    break;
                case "butchery":
                    echo "BUTCHERY";
                    break;
                case "seafood":
                    echo "SEAFOOD";
                    break;
                case "others":
                    echo "NON-GROCERY";
                    break;
            }
        ?>
    </h1>
</div>

<div class="container-fluid ">
    <div class="row">

        <div class="sidebar col-md-2">

            <ul class="list-group list-group-flush">
                <li class="categories">CATEGORIES</li>
                <li class="hr">
                    <hr>
                </li>
                <a href="/Front%20Store/php/Aisle.php?aisle=fruits">
                    <li class="list-group-item">Fruits and Vegetables</li>
                </a>
                <a href="/Front%20Store/php/Aisle.php?aisle=bakery">
                    <li class="list-group-item">Bakery</li>
                </a>
                <a href="/Front%20Store/php/Aisle.php?aisle=frozen">
                    <li class="list-group-item">Frozen</li>
                </a>
                <a href="/Front%20Store/php/Aisle.php?aisle=butchery">
                    <li class="list-group-item">Butchery</li>
                </a>
                <a href="/Front%20Store/php/Aisle.php?aisle=seafood">
                    <li class="list-group-item">Seafood</li>
                </a>
                <a href="/Front%20Store/php/Aisle.php?aisle=others">
                    <li class="list-group-item">Non-Grocery</li>
                </a>

            </ul>

        </div>

        <div class="main-content col-md-10">

            <div class="row" id="productTable">


            </div>

        </div>

    </div>
</div>


</body>

<script>
    class Product {

        constructor(tagID, id, image, item, price, category, quantity, availability) {
            this.tagID = tagID;
            this.id = id;
            this.image = image;
            this.item = item;
            this.price = price;
            this.category = category;
            this.quantity = quantity;
            this.availability = availability;
        }
    }

    function addCell(productDetails) {

        let BodyNode = document.getElementById("productTable");
        let firstDiv= document.createElement("div");
        firstDiv.setAttribute("class","col-xs-12 col-sm-6 col-md-4 col-lg-3 p-2");

        let secondDiv= document.createElement("div");
        secondDiv.setAttribute("id","card");

        let insideDiv = document.createElement("div");

        let imageLink=document.createElement("a");
        imageLink.setAttribute("href","/Front%20Store/php/ProductDescription.php?id="+productDetails.tagID);
        let imageItself=document.createElement("img");
        imageItself.setAttribute("class","item-pic");
        imageItself.setAttribute("class","card-img-top apples");
        imageItself.setAttribute("src",productDetails.image);
        imageItself.width=90;
        imageItself.height=190;
        imageLink.appendChild(imageItself);
        insideDiv.appendChild(imageLink);

        let thirdDiv= document.createElement("div");
        thirdDiv.setAttribute("class","card-body");

        let h5=document.createElement("h5");
        h5.setAttribute("class","card-title");
        h5.innerHTML=productDetails.item;
        thirdDiv.appendChild(h5);

        let h6=document.createElement("h6");
        h6.setAttribute("class","card-title");
        h6.innerHTML=productDetails.category;
        thirdDiv.appendChild(h6);

        let p=document.createElement("p");
        p.setAttribute("class","card-text");
        p.innerHTML="<br><br>";
        let span=document.createElement("span");
        span.setAttribute("class","cost");
        span.innerHTML=productDetails.price;
        p.appendChild(span);
        thirdDiv.appendChild(p);

        let buttonDiv = document.createElement("div");
        buttonDiv.setAttribute("class", "add-cart");
        let a=document.createElement("button");
        a.setAttribute("href","");
        a.setAttribute("class","btn btn-dark");
        a.onclick=  function() {
          alert("Added to cart");
          window.location.href = "Shopping-Cart.php?id="+productDetails.tagID+"&quantity=1";
        }
       
        a.innerHTML="ADD TO CART";
        buttonDiv.appendChild(a);

        thirdDiv.appendChild(buttonDiv);


        secondDiv.appendChild(insideDiv);
        secondDiv.appendChild(thirdDiv);
        firstDiv.appendChild(secondDiv);
        BodyNode.appendChild(firstDiv);


    }

    function addDealCell(productDetails) {

        let BodyNode = document.getElementById("productTable");
        let firstDiv= document.createElement("div");
        firstDiv.setAttribute("class","col-xs-12 col-sm-6 col-md-4 col-lg-3 p-2");

        let secondDiv= document.createElement("div");
        secondDiv.setAttribute("id","special");

        let insideDiv = document.createElement("div");
        insideDiv.setAttribute("class", "test");

        let imageLink=document.createElement("a");
        imageLink.setAttribute("href","/Front%20Store/php/ProductDescription.php?id="+productDetails.tagID);
        let imageItself=document.createElement("img");
        imageItself.setAttribute("class","item-pic");
        imageItself.setAttribute("class","card-img-top apples");
        imageItself.setAttribute("src",productDetails.image);
        imageItself.width=90;
        imageItself.height=190;
        imageLink.appendChild(imageItself);
        insideDiv.appendChild(imageLink);

        let specialDiv = document.createElement("div");
        specialDiv.setAttribute("id", "banner");
        specialDiv.innerHTML = "WEEKLY DEAL";
        insideDiv.appendChild(specialDiv);

        let thirdDiv= document.createElement("div");
        thirdDiv.setAttribute("class","card-body");

        let h5=document.createElement("h5");
        h5.setAttribute("class","card-title");
        h5.innerHTML=productDetails.item;
        thirdDiv.appendChild(h5);

        let h6=document.createElement("h6");
        h6.setAttribute("class","card-text");
        h6.innerHTML=productDetails.category;
        thirdDiv.appendChild(h6);

        let p=document.createElement("p");
        p.setAttribute("class","card-text");
        p.innerHTML="<br><br><br>";
        let span=document.createElement("span");
        span.setAttribute("class","cost");
        span.innerHTML=productDetails.price;
        p.appendChild(span);
        thirdDiv.appendChild(p);

        let buttonDiv = document.createElement("div");
        buttonDiv.setAttribute("class", "add-cart");
        let a=document.createElement("button");
        a.setAttribute("href","");
        a.setAttribute("class","btn btn-dark");
        a.onclick=  function() {
            alert("Added to cart");
            window.location.href = "Shopping-Cart.php?id="+productDetails.tagID+"&quantity=1";
        }

        a.innerHTML="ADD TO CART";
        buttonDiv.appendChild(a);

        thirdDiv.appendChild(buttonDiv);


        secondDiv.appendChild(insideDiv);
        secondDiv.appendChild(thirdDiv);
        firstDiv.appendChild(secondDiv);
        BodyNode.appendChild(firstDiv);


    }

</script>
<?php

loadTable();

function loadTable()
{
    $xmlDoc = new DOMDocument();
    $xmlDoc->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $items = $xmlDoc->documentElement->getElementsByTagName($_GET["aisle"]);

    foreach ($items as $item) {
        if ($item->getElementsByTagName("deal")->item(0)->textContent == "true" ||
            $item->getElementsByTagName("deal")->item(0)->textContent == "True") {
            ?>
            <script type="text/javascript">
            var productDetails = new Product(
                '<?php echo $item->getAttribute("id"); ?>',
                '<?php echo $item->getElementsByTagName("id")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("image")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("item")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("price")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("category")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("quantity")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("availability")->item(0)->textContent; ?>');
            addDealCell(productDetails);
        </script>
        <?php
        } else {
        ?>
        <script type="text/javascript">
            var productDetails = new Product(
                '<?php echo $item->getAttribute("id"); ?>',
                '<?php echo $item->getElementsByTagName("id")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("image")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("item")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("price")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("category")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("quantity")->item(0)->textContent; ?>',
                '<?php echo $item->getElementsByTagName("availability")->item(0)->textContent; ?>');
            addCell(productDetails);
        </script>

        <?php
        }

    }

}

?>

<br><br>
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
</html>

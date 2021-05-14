<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Edit Product List</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="../../../Metadata/icon.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            font-family: 'Montserrat', sans-serif;
        }

        .logo {
            font-size: 25px;
            font-weight: 700;
            transform: scale(2, 2);
            color: black;
        }

        .logo a {
            text-decoration: none !important;
        }

        .logo-sub {
            color: #f8ea1f;
        }

        body {
            background-image: url("https://cdn.wallpapersafari.com/22/18/riY3Ba.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            padding-top: 70px;
            background-attachment: fixed;
            padding-right: 1.5%;
            padding-left: 1.5%;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: white;
        }

        .navbar-dark .navbar-brand {
            color: #1adc1a
        }

        .navbar-brand {
            font-size: 25px;
            text-align: center;
        }

        .dropbtn {
            background-color: transparent;
            color: white;
            border: none;
            outline: none;
            padding: 8.7px;

        }

        .dropdown {
            position: relative;
            display: inline-block;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            z-index: 1;

        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 10px 16px;
            line-height: 2;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: lightgrey;
            text-decoration: none;

        }

        .dropdown:hover .dropdown-content {
            display: block;

        }

        .dropdown:hover .dropbtn {
            background-color: transparent;
        }

        h4.title {
            background: rgb(250, 250, 250);
            border-radius: 100px 100px 100px 100px;
            border-width: 3px;
            color: #003cff;
            padding: 1.5% 1.5% 1.5% 5%;
            margin-left: 20px;


        }

    </style>


    <script type="text/javascript" src="../../JavaScript/JavaScript%20Product%20Classes/OthersClass.js"></script>

    <script type="text/javascript">

        function editExistingItem(productDetails) {
            document.getElementById("image").value = productDetails.image;
            document.getElementById("item").value = productDetails.item;
            document.getElementById("price").value = productDetails.price;
            document.getElementById("category").value = productDetails.category;
            document.getElementById("quantity").value = productDetails.quantity;
            document.getElementById("availability").value = productDetails.availability;
            document.getElementById("deal").value = productDetails.deal;
            document.getElementById("description").value = productDetails.description;
        }
    </script>

</head>
<?php
include("EditOthersListFunctions.php");
?>

<body>

<link rel="stylesheet" href="../../CSS/NavBar.css" />
<?php
include("../CheckUser.php");
include("../BackStoreNavBar.php");
?>

<br/>


<div class="container">
    <h1 style="color: black ; text-align: center">Welcome UMarkt's Employee to our Store Inventory</strong></em>
        !</h1>
    </br>
    <h2 style="color: grey ; text-align: center"><strong> Feel free to update our Inventory</strong></h2>

</div>

<div class="jumbotron text-center" style="background-color: #ffe8a1; padding: 2%;">


    <fieldset class="form-group">

        <div class="row">
            <h2 style="color: #c69500 ; text-align: center"><strong> Department: </strong>
                <span style="color: saddlebrown">
                    Non-Grocery Products
            </span></h2>
        </div>
    </fieldset>

    <form method="post" action="EditOthersListFunctions.php">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Product ID</label>
            <div class="col-sm-10">
                <input type="text" id="product-id" name="othersId" class="form-control"
                       value='<?php if (isset($_GET["id"])) {
                           echo $_GET["id"];
                       } else {
                           echo checkID();
                       } ?>' placeholder="Product ID" readonly>

            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Image Link</label>
            <div class="col-sm-10">
                <input type="text" id="image" name="image" class="form-control" placeholder="image" required>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="item" name="item" placeholder="Item Name" required>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" placeholder="Price in CAD$" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="category" name="category" placeholder="Category" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Availability</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="availability" name="availability"
                       placeholder="Availability">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Deal/On-SALE</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deal" name="deal"
                       placeholder="Weekly Deals">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" name="description"
                       placeholder="Description">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm" style="display: flex; justify-content: center; align-items: center; height: 50px;">
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </div>
        </div>

        <div class="alert alert-secondary" role="alert" >
            To define the product to be On-SALE, just type <span class="alert-link"> "True"</span> or <span class="alert-link">"true"</span> in Deal/On-SALE line.
        </div>

    </form>
    <br/>

</div>
<?php
if (isset($_GET["id"])) {

    $xmlDoc = new DOMDocument();
    $xmlDoc->loadHTMLFile("../../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $item = $xmlDoc->getElementById("O" . $_GET["id"]);

    ?>

    <script type="text/javascript">


        var productDetails = new Product(
            '<?php echo $item->getElementsByTagName("id")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("image")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("item")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("price")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("category")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("quantity")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("availability")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("deal")->item(0)->textContent ?>',
            '<?php echo $item->getElementsByTagName("description")->item(0)->textContent ?>');
        editExistingItem(productDetails);
    </script>


    <?php
}
include("../../HTML/BackStoreFooter.html");
?>


<br/>
<br/>
<br/>
</body>
</html>




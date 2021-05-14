<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Product List - Bakery</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="../../../Metadata/icon.svg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


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

        .dropdown {
            position: relative;
            display: inline-block;
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

        .title.jumbotron {
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: #202326;
            color: white;
        }

    </style>


    <script type="text/javascript" src="../../JavaScript/JavaScript%20Product%20Classes/BakeryClass.js"></script>
    <script type="text/javascript">

        function deleteItem(ItemToDelete) {

            $.ajax({
                url: "../EditProducts/EditBakeryListFunctions.php",
                type: "post",
                data: {delete: "true", id: "BA"+ItemToDelete.cells[0].innerHTML}
            });

            ItemToDelete.parentNode.removeChild(ItemToDelete);

        }

    </script>

</head>

<body>

<link rel="stylesheet" href="../../CSS/NavBar.css" />
<?php
include("../CheckUser.php");
include("../BackStoreNavBar.php");
?>

<?php
include("../EditProducts/EditBakeryListFunctions.php");
?>

<br/>


<div class="container">
    <div class="jumbotron text-center title">
        <h1 class="h1"><span style="color: #ffed00">P</span>roducts List - Bakery</h1>
    </div>
</div>

<button type="button" class="btn btn-primary" onclick="window.location.href = '../EditProducts/EditBakery.php';">Add</button>

</br></br>


<form action="">

    <div class="table-responsive">
        <table class="table table-striped table-dark" id="productDetailTable">
            <thead>
            <tr>
                <th scope="col">ID#</th>
                <th scope="col">IMAGE</th>
                <th scope="col">ITEM</th>
                <th scope="col">Price</th>
                <th scope="col">Category/Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Availability/Arrival on Store</th>
                <th scope="col">On-Sale</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody id="productTable">


            </tbody>
        </table>
    </div>
</form>
<br/>

<?php
loadTable();
include("../../HTML/BackStoreFooter.html")
?>

</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>

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
        *{
            font-family: 'Montserrat', sans-serif ;
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

    .navbar-dark .navbar-nav .nav-link{
        color:white;
    }
    .navbar-dark .navbar-brand{
        color:#1adc1a
    }
    .navbar-brand{
        font-size: 25px;
        text-align: center;
    }

    .dropbtn{
        background-color: transparent;
        color: white;
        border:none;
        outline: none;
        padding:8.7px;

    }
    .dropdown{
        position: relative;
        display: inline-block;

    }
    .dropdown-content{
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        z-index: 1;

    }
    .dropdown-content a{
        float: none;
        color:black;
        padding:10px 16px;
        line-height: 2;
        display: block;
        text-align: left;
    }
    .dropdown-content a:hover{
        background-color: lightgrey;
        text-decoration: none;

    }
    .dropdown:hover .dropdown-content{
        display: block;

    }
    .dropdown:hover .dropbtn{
        background-color: transparent;
    }

    h4.title{
        background: rgb(250, 250, 250);
        border-radius: 100px 100px 100px 100px;
        border-width: 3px;
        color: #003cff;
        padding: 1.5% 1.5% 1.5% 5% ;
        margin-left: 20px;


    }
    </style>



</head>

<body>

<link rel="stylesheet" href="../../CSS/NavBar.css" />
<?php
include("../CheckUser.php");
include("../BackStoreNavBar.php");
?>

<br/>
<br/>
<br/>


<div class="container">
    <h1 style="color: black ; text-align: center">Welcome UMarkt's Employee to our Store Inventory</strong></em> !</h1>
    </br>
    <h2 style="color: gray ; text-align: center"><strong> Feel free to update our Inventory</strong> </h2>

</div>

<div class="jumbotron text-center" style="background-color: #ffe8a1; padding: 2%;">



    <fieldset class="form-group">
        <h3 style="color:darkslategrey ; text-align: center"><strong> Please choose the Department to Add/Edit/Delete Products</strong> </h3>

        <div class="row" style="padding-left: 15%">

            <div class="col-sm-10">
                <div class="list-group">

                    <a href="../ProductList/ProductListBakery.php" class="list-group-item list-group-item-action">Bakery</a>
                    <a href="../ProductList/ProductListFrozen.php" class="list-group-item list-group-item-action">Frozen</a>
                    <a href="../ProductList/ProductListButchery.php" class="list-group-item list-group-item-action">Butchery</a>
                    <a href="../ProductList/ProductListSeafood.php" class="list-group-item list-group-item-action ">Seafood</a>
                    <a href="../ProductList/ProductListFruits.php" class="list-group-item list-group-item-action ">Fruits and Vegetables</a>
                    <a href="../ProductList/ProductListOthers.php" class="list-group-item list-group-item-action ">
                        Non-Grocery Products
                    </a>
                </div>


            </div>
        </div>
    </fieldset>




</div>
<br/>

<?php

include("../../HTML/BackStoreFooter.html");
?>


<br/>
<br/>
<br/>
</body>
</html>



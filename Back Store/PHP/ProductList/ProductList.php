
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

    .dropdown{
        position: relative;
        display: inline-block;
    }

    .dropdown-menu{
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        z-index: 1;
    }

    .dropdown-menu a{
        float: none;
        color:black;
        line-height: 2;
        display: block;
        text-align: left;
    }

    .dropdown-menu a:hover{
        background-color: lightgrey;
        text-decoration: none;
    }

    .dropdown:hover .dropdown-menu{
        display: block;
    }

    .dropdown:hover{
        background-color: transparent;
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

    .title.jumbotron {
        padding-top: 15px;
        padding-bottom: 15px;
        background-color: #202326;
        color: white;
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
    <h2 style="color: #grey ; text-align: center"><strong>Please, choose the desired Department</strong> </h2>

</div>


<br/>
<br/>
<br/>

<div class="jumbotron text-center" style="margin-bottom:0">
    <h2>Your Feedback is Important to UMarkt's Family</h2>
    </br>

    <form>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label >First name</label>
                <input type="text" class="form-control"  placeholder="First name"  required>
            </div>

            <div class="col-md-4 mb-3">
                <label >Last name</label>
                <input type="text" class="form-control"  placeholder="Last name"  required>
            </div>

            <div class="col-md-4 mb-3">
                <label >Phone Number</label>
                <input type="text" class="form-control"  placeholder="Cell"  required>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label >Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="text" class="form-control"  placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label >Store Branch</label>
                <input type="text" class="form-control"  placeholder="Store Branch"  required>
            </div>

            <div class="col-md-4 mb-3">
                <label >Email Address</label>
                <input type="text" class="form-control"  placeholder="Email"  required>
            </div>
        </div>
        <div class="form-row">

            <div class="col-md-3 mb-3" >
                <label  >Feedback</label>
                <textarea type="text" class="form-control"  placeholder="Comments" rows="10"   required></textarea>
            </div>

        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=""  required>
                <label class="form-check-label" >
                    Agree to terms and conditions
                </label>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
</div>

</body>
</html>





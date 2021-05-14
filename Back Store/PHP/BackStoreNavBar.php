<nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-fixed-top">
    <div class="nav-content navbar">
        <a class="navbar-brand" href="/Front%20Store/php/home.php">
            <p class="logo" style="display: inline">
                <span class="logo-sub">U</span><span style="color: white" >Markt</span>
            </p>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#collapsibleNavbar"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <button class="dropbtn">
                        Product List
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/Back%20Store/PHP/ProductList/ProductListFruits.php">Fruits and vegetables</a>
                        <a class="dropdown-item" href="/Back%20Store/PHP/ProductList/ProductListBakery.php">Bakery</a>
                        <a class="dropdown-item" href="/Back%20Store/PHP/ProductList/ProductListFrozen.php">Frozen</a>
                        <a class="dropdown-item" href="/Back%20Store/PHP/ProductList/ProductListButchery.php">Butchery</a>
                        <a class="dropdown-item" href="/Back%20Store/PHP/ProductList/ProductListSeafood.php">Seafood</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/Back%20Store/PHP/ProductList/ProductListOthers.php">Non-Grocery Products</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Back%20Store/PHP/EditProducts/EditProduct.php">Edit Product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Back%20Store/PHP/UserList.php">User List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Back%20Store/PHP/OrderList.php">Order List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Front%20Store/php/home.php?user=admin&&login=TRUE">Front Store Page</a>
                </li>



<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // session_unset();
    $logged_in = $_SESSION["login"] ?? null;
    $user = $_SESSION["user"] ?? null;
    $admin = $_SESSION["admin"] ?? null;


    if(!$logged_in || $logged_in != "TRUE"){

        echo " <li class='nav-item'>
      <a class='nav-link' href='login.php' style='color:yellow'>Login</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='/Front%20Store/php/adduser.php'>Sign Up</a>
      </li>
      </ul>";
    }else{
        $message = "Welcome ".$_SESSION["user"];
        echo " <li class='nav-item'>
        <p class='nav-link nav-item' style='color:yellow'>$message</p>
          </li>
          <li class='nav-item'>
          <a class='nav-link' href='/Front%20Store/php/home.php?destroy=TRUE' style='color:red'>Logout</a></li></ul></div></div></nav>";
    }
    echo " </ul>
            </div>
            </div>
            </nav>";
?>

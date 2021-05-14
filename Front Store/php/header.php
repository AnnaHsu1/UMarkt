
<?php 
  session_start();
  // session_unset();
  $logged_in = $_SESSION["login"];
  $user = $_SESSION["user"];
  $admin = $_SESSION["admin"];


  include("../components/Home/front-header.html");
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
    if($admin == "TRUE"){
      echo "<li class='nav-item'>
      <a class='nav-link' href='/Back%20Store/PHP/ProductList/ProductList.php' >Back to Backstore</a>
      </li>";
    }
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

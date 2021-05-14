<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Order Page </title>
    <meta charset="utf-8">
<style>
body{

background-image:url("https://lovefoodhatewaste.ca/wp-content/uploads/2020/11/FoodBackgroundNomeat.jpg");
background-repeat: no-repeat;
background-size: cover;

}
.box-size{

width: 100%;
}
.box {
  background-color: white;
  width: 500px;
  height: 100%;
  margin: auto;
  margin-top: 75px;
  padding: 30px;
  position: relative;
  
  
}
.logo a {
        text-decoration: none !important;
        color: black;
        
      }

.container{
  text-align: center;
}
.logo{
  font-size: 25px;
  font-weight: 700;
  transform: scale(2, 2);
  display: inline-block;
  text-align: center;
  
  
}
.back{
  color: black;
  text-decoration: underline;
  font-size: 10px;
  bottom: 30px;
  position:absolute;

}
@import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
      *{
        font-family: 'Montserrat', sans-serif;
      } 
</style>
</head>

<body>

<div class ="box">
    
    <div class="container">
    <p class="logo"><a href="../php/home.php"><span class="logo-sub" style="color: yellow;">U</span>Markt</a></p>
    </div>
    <?php 
    
    echo"<p style='text-align:center;'>"."Welcome $_SESSION[username]! Here is your order </p>";
    echo "<hr>";
    
    libxml_use_internal_errors(true);

    $xmlDoc = new DOMDocument();
    $xmlDoc -> validateOnParse = true;

    $xmlDoc -> loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xmlDoc -> preserveWhiteSpace = false;

    $order = $xmlDoc->getElementById($_GET['order']);

    if (checkUserID($order->getElementsByTagName("userid")->item(0)->textContent)) {

        $items = $order->getElementsByTagName("item");

        foreach ($items as $item) {
            $product = check_item($item -> getElementsByTagName ("id") -> item(0) -> textContent);
            $product = $product->getElementsByTagName("item")->item(0)->textContent;
            $quantity = $item -> getElementsByTagName ("quantity") -> item(0) -> textContent;
            echo "<p style='text-align:center;'>".$quantity." ".$product."</p>";
        }

    }


    
    
//   foreach($item as $value){
//
//        print "<p style='text-align:center;'>".$value."<br />";
//      }
     
    
    
    function check_item($productID){ //check to see if same username

        $xml = new DOMDocument();
        $xml->validateOnParse = true;
        $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xml->preserveWhiteSpace = false;
      
       $name = $xml->getElementById($productID);

           //$user = array();
      
           //for($i = 0; $i<count($name); $i++){
              //$user[$i] = $name[$i]->textContent;
          //}
          //return $user;
          return $name;
      }

    function checkUserID($userID) {
        $xml = new DOMDocument();
        $xml->validateOnParse = true;
        $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xml->preserveWhiteSpace = false;

        $users = $xml -> getElementsByTagName("user");
        foreach ($users as $user) {
            $email = $user->getElementsByTagName("email")->item(0)->textContent;
            if ($email == $_GET["email"]) {
                $userTagID = $user->getAttribute("id");
                if ($userTagID == $userID) {
                    return true;
                }
            }
        }

        return false;
    }
      
    

?>
    <p><a href="../php/home.php" class="back"> BACK TO HOME PAGE</a></p>


</body>
</html>
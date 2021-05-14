<?php
session_start();
if(isset($_POST["clear"])){
  unset($_SESSION['cart']);
  header("Location: Shopping-Cart.php");
}
if($_SESSION["login"]!="TRUE"){
  echo "<script>location='login.php';</script>";
}
// session_destroy();
if(isset($_GET["id"])){
$xmlDoc = new DOMDocument();
$xmlDoc->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$id = $_GET["id"];
$item = $xmlDoc->getElementById($_GET["id"]);
$quantity = $_GET["quantity"];
$name = $item->getElementsByTagName("item")->item(0)->textContent;
$price = $item->getElementsByTagName("price")->item(0)->textContent;
$image = $item->getElementsByTagName("image")->item(0)->textContent;

$product = array("name"=>$name,"price"=>$price,"image"=>$image,"quantity" => $quantity,"id"=>$id);
$cart = array();
if(isset($_SESSION["cart"])){
  $cart = $_SESSION["cart"];
  array_push($cart,$product);
  $_SESSION["cart"] = $cart;  
}else {
  $_SESSION["cart"]= array($product);
}


}

?>

<!doctype html>
<html lang="en">

<head>
  <title> Shopping Cart </title>
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
  <link rel="stylesheet" href="../Styles/home.css" />
  <link rel="stylesheet" href="../Styles/shopping-cart.css" />
</head>

<body>


  <?php
  ini_set('display_errors', 0);
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include("header.php");
  include("../components/Home/cart-header.html");

  $cart = $_SESSION["cart"];
  



  ?>
  <!-- SHOPPING CART -->


                <tbody>
                  <?php 
            
                  switch($_GET["action"]){
                    
                    case "add":
                      if(isset($_POST["quantity"])){ //check if POST request contains quantity
                        
                        $quantity = $_POST["quantity"]; 
                        $item = $_GET['item'];
                        
                        $i=0;
                        foreach($cart as $product){
                         
                          if($product['name']=$item){
                            $cart[$i]["quantity"] = $quantity;
                            $_SESSION["cart"] = $cart;
                            break;
                          }
                          $i++;
                        }
                      }
                      break;
                      case "delete":  

                          $item = $_GET['item'];
                          
                          $i=0;
                          foreach($cart as $product){
                           
                            if($product['name']=$item){
                              unset($cart[$i]);
                              $_SESSION["cart"] = $cart;
                              break;
                            }
                            $i++;
                          }
                        
                    }
                    
                  foreach($cart as $product){
                   $price =  $product["quantity"] * $product["price"];
                    echo "
                    
                    <tr class='hala'>
                    <td>
                      <div class='main'>
                        <div class='d-flex'>
                          <img src='$product[image]'  style='width: 145px; height: 98px;'>
                        </div>
                        <div class='des'>
                          <p>$product[name]</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6> $product[price] </h6>
                      <br>
                    </td>
                    <td>
                      <div class='quantity'>
                      <form method='POST' action='Shopping-Cart.php?action=add&item=$product[name]'>
                        <input type='text' name='quantity' id='quantity' value='$product[quantity]'>
                        <input class='btn1' type='submit' value='Update'>
                      </form>
                      </div>
                    </td>
                    <td>
                      <span id='price'>$price</span>
                      <form method='POST' action='Shopping-Cart.php?action=delete&item=$product[name]'>
                      <button type='submit'  class='btn btn-dark btn1 remove' > Remove</button> &nbsp
                      </form>
                    </td>
                  </tr>

                    ";
                    
                  }
                  ?>

                </tbody>
              </div>

            </table>

          </div>
        </div>
        <form action='Shopping-Cart.php' method="POST">
          <button class="btn btn-dark btn1"  type=submit name="clear">Clear Cart</button>
        </form>

      </div>
      
        <?php 
        $total=0;
        for($i=0;$i<count($cart);$i++){
          $products = array($cart[$i]);
          
          foreach($products as $product){
            
            $total+=$product["price"]*$product["quantity"];
          }
        }
        $qst = round($total*0.0975,2);
        $gst = $total*0.05;
        $final_total = $total + $gst + $qst;
        ?>
        
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 total">

        <div class="checkout">
          <ul>
            <li class="subtotal">subtotal
              <span id="price"><?php echo$total ?></span>
            </li>
            <li class="qst">QST
              <span>$<?php echo$qst; ?></span>
            </li>
            <li class="gst">GST
              <span>$<?php echo$gst; ?></span>
            </li>
            <li class="cart-total">Total
              <span>$<?php echo$final_total; ?></span>
            </li>

          </ul>
          <a href="#" class="proceed-btn">Proceed to Checkout</a>
        </div>

      </div>

    </div>
  </div>










  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
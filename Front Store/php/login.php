<?php 
session_start();
if($_SESSION["login"]=="TRUE"){
  echo "<script>location='home.php';</script>";
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="=en">

<head>
  <meta charset="utf-8" />
  <title>Login</title>

  <link rel="stylesheet" href="../Styles/Login.css" />
  <link rel="icon" href="../../Metadata/icon.svg" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php

  ?>
</head>


<?php
include("../components/Home/Login.html"); // import login template
$xml = new DOMDocument(); // initialize a DOM document
$xml->load("../../Database.xml"); // load the xml database 

?>

<script>
    function validateForm() { // check if user exists
      email = document.getElementById("email").value;
      var users = <?php echo json_encode(get_users($xml)); ?>; // convert php array to javaScript

    }
  </script>
<?php

if (isset($_POST['email'])&& isset($_POST['password'])) {

  $email = $_POST["email"];
  $password = $_POST["password"];
  $userlist = get_users($xml);

  if($email=="admin" && $password=="admin"){
    $_SESSION["admin"]="TRUE";
    $_SESSION["user"]="Admin";
    $_SESSION["login"]="TRUE";
    header("Location: ../../Back%20Store/PHP/ProductList/ProductList.php");
    exit;
  }
  for ($i=0;$i<count($userlist);$i++){
    
      if($email==$userlist[$i][0] && $password==$userlist[$i][1]){
        $name = $userlist[$i][2];
        $id = $userlist[$i][3];
        $_SESSION["user"]=$name;
        $_SESSION["userid"]=$id;
        $_SESSION["login"]="TRUE";
        echo "<script>location='home.php';</script>";
        break;
      }else {
        $message = "wrong email or password";
      }

    
  }
  
}
$_POST["submit"]="none";
function get_users(&$xml)
{
  $xml->validateOnParse = true;
  $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
  $xml->preserveWhiteSpace = false;

  $node = 0;
  $current_node = 0;
  $i = 0;
  $users = array();
  while (is_object($finance = $xml->getElementsByTagName("userlist")->item($i))) { // get usrlist
    foreach ($finance->childNodes as $nodename) {  // get child nodes of userlist
      if ($nodename->nodeName == 'user') { // get user nodes 

        foreach ($nodename->childNodes as $subNodes) {  // iterate over user's tags

          $node_name = $subNodes->nodeName;
          $node_value = $subNodes->nodeValue;
          if ($node_name == "email") { // get email node  
            $users[$node][0] = $node_value; // extract the value
          }
          if ($node_name == "password") { // get password node
            $users[$node][1] = $node_value; // extract value
          }
          if ($node_name == "firstname"){ // get first name node
            $users[$node][2] = $node_value; // extract first name
            $users[$node][3] = $nodename->getAttribute("id");
          }
         
        }
        $node++;
      }
    }
    $i++;
  }

return $users;
}
?>
  <p style="color:red"><?php echo $message?></p>
    <div class="form-group mid">
            <div class="btn-group">
              <button type="submit" value="login" class="btn btn-black">SIGN IN</button>
            </div>
            <p><a href="resetpass.php">Forgot Password?</a></p>
          </div>
        </form>
        <p><a href="home.php" class="back"> BACK TO HOME PAGE</a></p>
      </div>
    </div>
  </body>

</html>

  
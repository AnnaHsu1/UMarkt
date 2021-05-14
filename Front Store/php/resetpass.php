<!DOCTYPE html>
<html lang="=en">
  <head>
    <meta charset="utf-8" />
    <title>Forgot Password?</title>
    <link rel="stylesheet" href="../Styles/Login.css" />
    <link rel="icon" href="../../Metadata/icon.svg" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <?php
$message="";

$xml = new DOMDocument(); // initialize a DOM document
$xml->load("../../Database.xml"); // load the xml database 




if (isset($_POST['email'])) {

  $email = $_POST["email"];
  $userlist = get_users($xml);

  for ($i=0;$i<count($userlist);$i++){
      
      if($email==$userlist[$i][0]){
       echo" <script>alert('Successful! You will recieve an email to reset password. You will be redirected to home page now. '); </script>";
       echo "<script>location='home.php';</script>";
       exit;
        break;
      }else{
        $message = "Email does not exist.";
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
  <body>
    <div class="main reset" >
      <div class="login-box">
        <div class="box-head">
          <p class="logo"><a href="HomePage.html"><span class="logo-sub">U</span>Markt</a></p>
          <h1>Forgot your password?</h1>
          <hr style="width:50%; margin:auto;">
          <p class="inner-title">Dont have an account? <a href="adduser.php">Sign up now </a>or go back to <a href="login.php">Sign in</a> page.</p>
          <hr style="width:50%; margin:auto;">
          <p class="info">Please enter your email address used to sign in and we'll send you a link to reset your password</p>
        </div>
        <form method="POST">
          <div class="form-group">
            <label>Email Address<sup>*</sup></label>
            <input type="email" name="email" id="email" class="form-control" required email/>
            <p style="color:red"><?php echo $message ?></p>
  
          </div>
          <div class="btn-group" style="margin-top: 10px;">
            <button type="submit"  class="btn btn-black">RESET MY PASSWORD</button>
          </div>
        </form>
        <p><a href="home.php" class="back">< BACK TO HOME PAGE</a></p>
          </div>
      </div>
    </div>
  </body>

</html>

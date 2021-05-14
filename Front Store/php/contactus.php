<?php 
include("../components/Home/ContactUs.html");
?>


<?php 
// session_start();
// if(isset($_POST["enter"])){ //why not like onclick function?

//     $username = $_POST["username"];
//     $file = fopen("Data.xml","r");
//     $found = false;

//     if($file){

//         while(!feof($file)){
//             $line = fgets($file);
            
//             if(strpos($line,$username)!==false){

//                 $found = true;
//                 fclose($file);
//                 //$_SESSION["username"] = $_POST["username"];
//                 echo"Welcome $_POST[username]";

//             }
//         }
//     }

//     if(!$found){

//         include("Register.html");
//     }

?>

<?php 
if(isset($_POST["enter"])){
  $username = $_POST["username"];
  
  session_start();
  $_SESSION["username"] = $username;
  
    libxml_use_internal_errors(true); 
    $xml = new DOMDocument(); // initialize a DOM document
    $xml->load("../../Database.xml"); // load the xml database 

    $name = check_name($xml);

    if(in_array($username,$name)){

      header("Location: OrderPage.php?order=".$_POST["order"]."&email=".$_POST["username"]);//redirect to orderpage
        $_POST=array();
      
        
    }else {
      echo "<script>location='adduser.php';</script>"; 
      

    }



}



function check_name(&$xml){ //check to see if same username
  $xml->validateOnParse = true;
  $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
  $xml->preserveWhiteSpace = false;

     $name = $xml->getElementsByTagName("email");
     $user = array();

     for($i = 0; $i<count($name); $i++){
        $user[$i] = $name[$i]->textContent;
    }
    return $user;
}




?>
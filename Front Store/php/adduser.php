<?php 
session_start();
if($_SESSION["login"]=="TRUE"){
  echo "<script>location='home.php';</script>"; // redirect to home if logged in 
}
?>

<!DOCTYPE html>
<html lang="=en">

<head>
  <meta charset="utf-8" />
  <title>Sign up</title>

  <link rel="stylesheet" href="../Styles/Login.css" />
  <link rel="icon" href="../../Metadata/icon.svg" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
  libxml_use_internal_errors(true);
  $xml = new DOMDocument(); // initialize a DOM document
  $xml->load("../../Database.xml"); // load the xml database 
  $users = get_users($xml);
  ?>

</head>

<body>
  <?php
  include("../components/Home/Register.html");
  ?>
  <script>
    function validateForm() { // check if user exists
      email = document.getElementById("email").value;
      var users = <?php echo json_encode($users); ?>; // convert php array to javaScript
      for (var i = 0; i < users.length; i++) {
        exisiting = (users[i]);
        if ( exisiting == email) {
          alert("Email already exists");
          return false;
        }
      }
      return true;
    }
  </script>



  <?php
  $users;
  if ($_POST["register"] = "sent" && isset($_POST["first-name"])) {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $date = $_POST["date"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];


    $users = get_users($xml);
    $trimmed_email = trim(strtolower($email));
    if (in_array($trimmed_email, $users)) {
      echo "<h1>USER ALREADY EXISTS</h1>";
      return;
    } else {
      register_user($xml, $first_name, $last_name, $email, $mobile, $date, $gender, $password);
      unset($_POST["email"]);
    }
  }

  function register_user(&$xml, $first_name, $last_name, $email, $mobile, $date, $gender, $password)
  {
    $xml->validateOnParse = true;
    $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xml->preserveWhiteSpace = false;


    $userid = get_user_id($xml);
    $xml_userlist = $xml->getElementById("UserList"); // get the user list

    $xml_user = $xml->createElement("user"); // create a user 
    $xml_user->setAttribute("id", "U" . $userid); // set the attribute id

    $xml_id = $xml->createElement("id", $userid); // set id tag
    $xml_user->appendChild($xml_id); // append to user tag

    $xml_first_name = $xml->createElement("firstname", $first_name); // set the firstname tag with its value 
    $xml_user->appendChild($xml_first_name); // append first name to user tag

    $xml_last_name = $xml->createElement("lastname", $last_name); // set the lastname tag with its value 
    $xml_user->appendChild($xml_last_name); // append last name to user tag

    $xml_email = $xml->createElement("email", $email); // set the email tag with its value
    $xml_user->appendChild($xml_email); // append email name to user tag

    $xml_mobile = $xml->createElement("phonenumber", $mobile); // set the phonenumber tag with its value
    $xml_user->appendChild($xml_mobile); // append date name to user tag

    $xml_date = $xml->createElement("date", $date); // set the date of birth tag with its value
    $xml_user->appendChild($xml_date); // append date name to user tag

    $xml_gender = $xml->createElement("gender", $gender); // set the gender tag with its value
    $xml_user->appendChild($xml_gender); // append gender  to user tag

    $xml_password = $xml->createElement("password", $password); // set the password tag with its value
    $xml_user->appendChild($xml_password); // append gender  to user tag

    $xml_userlist->appendChild($xml_user);
    $xml->loadXML($xml->saveHTML());
    $xml->formatOutput = true;
    $xml->save("../../Database.xml"); // save file when done;
    unset($_POST["first-name"]);
    setsignupcookie($first_name);
  }


  function get_users(&$xml) // gets the array of users email to verify if user aleardy exists
  {
    $xml->validateOnParse = true;
    $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xml->preserveWhiteSpace = false;
    $emails = $xml->getElementsByTagName("email");
    $users =  array();
    for ($i = 0; $i < count($emails); $i++) {
      $users[$i] = $emails[$i]->textContent;
    }
    return $users;
  }

  function get_user_id(&$xml)
  { // gets the id of the new user
    $xml->validateOnParse = true;
    $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xml->preserveWhiteSpace = false;
    $users = $xml->getElementsByTagName("user");

    $id = 1;
    foreach ($users as $user) {
      if ($user->getElementsByTagName("id")->item(0)->textContent != $id) {
        break;
      }
      $id++;
    }
    return $id;
  }

  function setsignupcookie($user){
    // setcookie("user","cookies changed",time()+3600);
    echo "<script>location='home.php?user=$user&login=TRUE';</script>"; 
  }
  ?>
</body>

</html>
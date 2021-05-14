<?php 

$xml = new DOMDocument(); // initialize a DOM document
$xml->load("../../Database.xml"); // load the xml database 

// register_user($xml);
$order = $_SESSION["cart"];
foreach($order as $item){
  
}
function register_user(&$xml)
{
  $xml->validateOnParse = true;
  $xml->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
  $xml->preserveWhiteSpace = false;


 
  $xml_orderlist = $xml->getElementById("orderlist"); // get the order list

  $xml_order = $xml->createElement("order"); // create an order
  $xml_order->setAttribute("id", "U"  ); // set the attribute id

  $userid = $xml->createElement("userid", ); // set user ID
  $xml_order->appendChild($userid); // append to user tag

  $xml_time = $xml->createElement("time", $time); // set the time of order
  $xml_order->appendChild($xml_time); // 

  $xml_items = $xml->createElement("items"); // open the items tag
  $xml_order->appendChild($xml_items); // 
  
  $xml_item1 = $xml->createElement("item"); // set the firstname tag with its value 
  $xml_item1->setAttribute("id",); // set item id
  $xml_item1->setAttribute("quantity",); // set item quantity

  $xml_items->appendChild($xml_item1); // append item to items

  $xml_orderlist->appendChild($xml_order); // append order to orederlist
  $xml->loadXML($xml->saveHTML());
  $xml->formatOutput = true;
  $xml->save("../../Database.xml"); // save file when done;
}
?>
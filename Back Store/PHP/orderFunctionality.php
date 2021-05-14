<?php

// libxml_use_internal_errors(true);
// $xmlDoc = new DOMDocument();
// $xmlDoc->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
// libxml_use_internal_errors(false);
$request = null;
parse_str($_SERVER['QUERY_STRING'], $request);

if (isset($request['action']) && $request['action'] === 'submit') {
  editOrder($request);
} elseif (isset($_POST['delete'])) {
  deleteOrder($_POST['id']);
}

  function readOrders() {    
    libxml_use_internal_errors(true);
    $xmlDoc = new DOMDocument();
    $xmlDoc->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_use_internal_errors(false);

    $orders = $xmlDoc->documentElement->getElementsByTagName("order");

    // <order id="O1">
    //   <userid>U1<userid>
    //   <cart-total>123</cart-total>
    //   <time>2021-04-20T01:13:36.108Z</time>
      // <item>
      //   <id>BA2</id>
      //   <quanity>2</quanity>
      // </item>
    // </order>
    
    foreach ($orders as $order) {
      $temp = null;
      
      $return[] = readOrder($order, $xmlDoc);
    }

    return $return;
  }

  function readUser($xmlDoc, $id) {
    $user = $xmlDoc->getElementById($id);

    $result['id'] = $id;
    $result['firstname'] = $user->getElementsByTagName("firstname")->item(0)->textContent;
    $result['lastname'] = $user->getElementsByTagName("lastname")->item(0)->textContent;
    $result['email'] = $user->getElementsByTagName("email")->item(0)->textContent;
    $result['phonenumber'] = $user->getElementsByTagName("phonenumber")->item(0)->textContent;
    $result['address'] = $user->getElementsByTagName("address")->item(0)->textContent;

    return $result;
  }

  
  function readItem($xmlDoc, $data) {
    // <others id="O4">
    //   <id>4</id>
    //   <image>https://i.pinimg.com/originals/44/6b/e6/446be65991ff26fb8be0cbfaddcba5cb.jpg</image>
    //   <item>BBQ Grill	</item>
    //   <price>319.95$ </price>
    //   <category>4.0 BTU </category>
    //   <quantity>32 units</quantity>
    //   <availability>Special Occasion	</availability>
    //   <description> For indoors and outdoors usage</description>
    // </others>
    $item = $xmlDoc->getElementById($data->getElementsByTagName('id')->item(0)->textContent);
    $result['item_quantity'] = $data->getElementsByTagName('quantity')->item(0)->textContent;

    $result['id'] = $data->getElementsByTagName('id')->item(0)->textContent;
    $result['image'] = $item->getElementsByTagName("image")->item(0)->textContent;
    $result['item'] = trim($item->getElementsByTagName("item")->item(0)->textContent);
    $result['price'] = floatval($item->getElementsByTagName("price")->item(0)->textContent);
    $result['category'] = $item->getElementsByTagName("category")->item(0)->textContent;
    $result['quantity'] = $item->getElementsByTagName("quantity")->item(0)->textContent;
    $result['availability'] = $item->getElementsByTagName("availability")->item(0)->textContent;
    $result['description'] = $item->getElementsByTagName("description")->item(0)->textContent;

    return $result;
  }

  function readOrder($order, $xmlDoc = null) {
    if (!$xmlDoc) {
      libxml_use_internal_errors(true);
      $xmlDoc = new DOMDocument();
      $xmlDoc->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      libxml_use_internal_errors(false);

      $order = $xmlDoc -> getElementById($order);
    } else {
      $temp['id'] = $order->getAttribute('id');
    }
    
    $temp['cart-total'] = floatval($order->getElementsByTagName("cart-total")->item(0)->textContent);

    $dateTime = date_create($order->getElementsByTagName("time")->item(0)->textContent);
    $temp['time'] = date_format($dateTime, "Y/m/d H:i:s");

    
    // items
    $items = $order->getElementsByTagName("item");
    $quanity = 0;

    for ($i = 0; $i < count($items); $i++) {
      $temp['item'][] = readItem($xmlDoc, $items->item($i));
      $quanity += $temp['item'][$i]['item_quantity'];
    }
    $temp['quanity'] = $quanity;

    //user 
    $userId = $order->getElementsByTagName("userid")->item(0)->textContent;

    $temp['user'] = readUser($xmlDoc, $userId);

    return $temp;
  }

  

  function editOrder($request) {
    libxml_use_internal_errors(true);
    $xmlDoc = new DOMDocument();
    $xmlDoc->loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_use_internal_errors(false);

    $order = $xmlDoc -> getElementById($request['id']);
    $order->getElementsByTagName("cart-total")->item(0)->nodeValue = floatval($_POST['cart-total']);
    
    
    
    // items
    foreach ($order->getElementsByTagName("item") as $el) {
      $order->getElementsByTagName("items")->item(0)->removeChild($el);
    }
    $items = $order->getElementsByTagName("items");
    $item = null;
    foreach ($_POST['item'] as $key => $value) {
      $item = $xmlDoc->createElement("item");
      $id = $xmlDoc->createElement('id', $key);
      $quanity = $xmlDoc->createElement('quantity', $value);
      $item->appendChild($id);
      $item->appendChild($quanity);

      $items->item(0)->appendChild($item);
    }

    $xmlDoc->loadXML($xmlDoc->saveHTML());
    $xmlDoc->formatOutput = true;
    $xmlDoc->save("../../Database.xml");
    header("Location: /Back%20Store/PHP/OrderList.php");
  }

  function deleteOrder($id) {

    $xmlDoc = new DOMDocument();
    $xmlDoc -> validateOnParse = true;

    $xmlDoc -> loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xmlDoc -> preserveWhiteSpace = false;

    $orderToDelete = $xmlDoc -> getElementById($id);
    $orderToDelete -> parentNode -> removeChild($orderToDelete);

    $xmlDoc -> saveHTMLFile("../../Database.xml");

    $_POST["delete"] = "false";
}
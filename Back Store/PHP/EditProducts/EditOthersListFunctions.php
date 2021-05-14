
<?php

function loadTable() {
    $xmlDoc = new DOMDocument();
    $xmlDoc -> loadHTMLFile("../../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $items = $xmlDoc -> documentElement -> getElementsByTagName("others");

    foreach ($items as $item) {
        ?>
        <script type="text/javascript">
            var productDetails = new Product(
                '<?php echo $item -> getElementsByTagName("id") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("image") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("item") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("price") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("category") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("quantity") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("availability") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("deal") -> item(0) -> textContent ?>',
                '<?php echo $item -> getElementsByTagName("description") -> item(0) -> textContent ?>');
            addRow(productDetails);
        </script>

        <?php

    }

}

function deleteItem($id) {

    $xmlDoc = new DOMDocument();
    $xmlDoc -> validateOnParse = true;

    $xmlDoc -> loadHTMLFile("../../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xmlDoc -> preserveWhiteSpace = false;

    $itemToDelete = $xmlDoc -> getElementById($id);
    $itemToDelete -> parentNode -> removeChild($itemToDelete);

    $xmlDoc -> saveHTMLFile("../../../Database.xml");

    $_POST["delete"] = "false";
}

if (isset($_POST["delete"])) {
    deleteItem($_POST["id"]);
}

function addItem() {

    $xmlDoc = new DOMDocument();
    $xmlDoc -> validateOnParse = true;

    $xmlDoc -> loadHTMLFile("../../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xmlDoc -> preserveWhiteSpace = false;

    if (idExists($_POST["othersId"])) {
        editExistingItem($xmlDoc);
    } else {
        addNewItem($xmlDoc);
    }

    //Format the Database.xml doc in a neat way
    $xmlDoc -> loadXML($xmlDoc -> saveHTML());
    $xmlDoc -> formatOutput = true;

    $xmlDoc -> save("../../../Database.xml");

    $_POST["add"] = "false";

    header("Location: ../ProductList/ProductListOthers.php");
}

function addNewItem(&$xmlDoc) {

    $itemList = $xmlDoc -> getElementById("OthersList");

    $newItem = $xmlDoc -> createElement("others");
    $newItem -> setAttribute("id", "O".$_POST["othersId"]);

    $id = $xmlDoc -> createElement("id", $_POST["othersId"]);
    $newItem -> appendChild($id);

    $image = $xmlDoc -> createElement("image", $_POST["image"]);
    $newItem -> appendChild($image);

    $item = $xmlDoc -> createElement("item", $_POST["item"]);
    $newItem -> appendChild($item);

    $price = $xmlDoc -> createElement("price", $_POST["price"]);
    $newItem -> appendChild($price);

    $category = $xmlDoc -> createElement("category", $_POST["category"]);
    $newItem -> appendChild($category);

    $quantity = $xmlDoc -> createElement("quantity", $_POST["quantity"]);
    $newItem -> appendChild($quantity);

    $availability = $xmlDoc -> createElement("availability", $_POST["availability"]);
    $newItem -> appendChild($availability);

    $deal = $xmlDoc -> createElement("deal", $_POST["deal"]);
    $newItem -> appendChild($deal);

    $description = $xmlDoc -> createElement("description", $_POST["description"]);
    $newItem -> appendChild($description);

    $itemList -> appendChild($newItem);
}

function editExistingItem(&$xmlDoc) {

    $product = $xmlDoc -> getElementById("O".$_POST["othersId"]);

    $product -> getElementsByTagName("image") -> item(0) -> textContent = $_POST["image"];

    $product -> getElementsByTagName("item") -> item(0) -> textContent = $_POST["item"];

    $product -> getElementsByTagName("price") -> item(0) -> textContent = $_POST["price"];

    $product -> getElementsByTagName("category") -> item(0) -> textContent = $_POST["category"];

    $product -> getElementsByTagName("quantity") -> item(0) -> textContent = $_POST["quantity"];

    $product -> getElementsByTagName("availability") -> item(0) -> textContent = $_POST["availability"];

    $product -> getElementsByTagName("deal") -> item(0) -> textContent = $_POST["deal"];

    $product -> getElementsByTagName("description") -> item(0) -> textContent = $_POST["description"];

}

if (isset($_POST["submit"])) {
    addItem();
}

function checkID() {


    $xmlDoc = new DOMDocument();
    $xmlDoc -> loadHTMLFile("../../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $products = $xmlDoc -> documentElement -> getElementsByTagName("others");

    $id = 1;
    foreach ($products as $product) {
        if ($product -> getElementsByTagName("id") -> item(0) -> textContent != $id) {
            break;
        }
        $id++;
    }
    return $id;
}

function idExists($id) {

    $xmlDoc = new DOMDocument();
    $xmlDoc -> loadHTMLFile("../../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $item = $xmlDoc -> getElementById("BA".$id);

    if (is_null($item))
        return false;

    return true;
}

?>
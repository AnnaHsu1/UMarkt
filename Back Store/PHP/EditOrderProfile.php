<?php 
    include("CheckUser.php");
    include('../HTML/EditOrderProfile.html'); 
    include('orderFunctionality.php');
?>

<body>
    <!-- navbar -->
    <?php include("BackStoreNavBar.php"); ?>
    <!-- end navbar -->
    </br>

    </br>

    <div class="container">
        <div class="jumbotron text-center title">
            <h1 class="h1"><span style="color: #ffed00">E</span>dit Order Profile</h1>
        </div>
        </nav>
    </div>
    <!-- main container -->
    <div class="jumbotron text-center" style="background-color: #e9ecef; padding: 2%;">
        <?php 

            parse_str($_SERVER['QUERY_STRING'], $arr);
            $data = readOrder($arr['id']);
            echo "
            <form action=\"/Back%20Store/PHP/orderFunctionality.php?id={$arr['id']}&action=submit\" method=\"POST\">
            <div class=\"form-group row\">
                <div class=\"col-sm-2\"></div>
                <label class=\"col-sm-1 col-form-label text-left\">User ID</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"user-id\" class=\"form-control\" placeholder=\"User ID\"  disabled value=\"{$data['user']['id']}\">
                </div>
            </div>

            <div class=\"form-group row\">
                <div class=\"col-sm-2\"></div>
                <label class=\"col-sm-1 col-form-label text-left\">First Name</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"user-first-name\" class=\"form-control\"  disabled placeholder=\"First Name\" value=\"{$data['user']['firstname']}\">
                </div>
            </div>

            <div class=\"form-group row\">
                <div class=\"col-sm-2\"></div>
                <label class=\"col-sm-1 col-form-label text-left\">Last Name</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"user-last-name\" class=\"form-control\" placeholder=\"Last Name\" disabled value=\"{$data['user']['lastname']}\">
                </div>
            </div>

            <div class=\"form-group row\">
                <div class=\"col-sm-2\"></div>
                <label class=\"col-sm-1 col-form-label text-left\">Email</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"user-email\" class=\"form-control\" placeholder=\"Email\"  disabled value=\"{$data['user']['email']}\">
                </div>
            </div>

            <div class=\"form-group row\">
                <div class=\"col-sm-2\"></div>
                <label class=\"col-sm-1 col-form-label text-left\">Phone Number</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"user-phone-number\" class=\"form-control\" placeholder=\"Phone Number\" disabled 
                        value=\"{$data['user']['phonenumber']}\">
                </div>
            </div>

            <div class=\"form-group row\">
                <div class=\"col-sm-2\"></div>
                <label class=\"col-sm-1 col-form-label text-left\">Address</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"user-address\" class=\"form-control\" placeholder=\"Customer address\" disabled 
                        value=\"{$data['user']['address']}\"></input>
                </div>
            </div>

            <div class=\"table-responsive\">
                <table class=\"table table-striped table-dark\" id=\"product_table\">
                    <thead>
                        <tr>
                            <th scope=\"col\">Item ID</th>
                            <th scope=\"col\">Purchase Item</th>
                            <th scope=\"col\">Price</th>
                            <th scope=\"col\">Category/Description</th>
                            <th scope=\"col\">Quantity</th>
                            <th class=\"actions\" scope=\"col\">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    foreach ($data['item'] as $product) {
                        echo "<tr>
                        <td class=\"product-name\">{$product['id']}</td>                        
                        <td class=\"product-name\">{$product['item']}</td>
                        <td><span class=\"product-price\">{$product['price']}</span>$/{$product['quantity']}</td>
                        <td>Strawberry filling</td>
                        
                        <td class=\"quanity\">
                            <input type=\"number\" name=\"item[{$product['id']}]\" class=\"input sr-only\" 
                                value=\"{$product['item_quantity']}\">
                            <span class=\"value\">{$product['item_quantity']}</span>
                        </td>
                        <td>
                            <button type=\"button\" onclick=\"addQuanity($(this).closest('tr').children('.quanity'))\"
                                class=\"btn btn-primary\">Add</button>
                            <button type=\"button\" onclick=\"removeQuanity($(this).closest('tr').children('.quanity'))\"
                                class=\"btn btn-danger\">Delete</button>
                        </td>
                    </tr>";
                    }
                echo "
                    </tbody>
                </table>
                <div class=\"container mb-3 total\">
                    <div class=\"row\">
                        <div class=\"col\">Client's total</div>
                        <div class=\"col\"><span class=\"quanity\">{$data['quanity']}</span></div>
                        <div class=\"col\">C$<span class=\"price\"><input id=\"cart-total\" type=\"number\" name=\"cart-total\" min=\"0\" step=\"0.01\" class=\"w-75 m-1\" 
                            value=\"{$data['cart-total']}\">
                        </span></div>
                    </div>
                </div>
            </div>

            <div class=\"form-group row\">
                <div class=\"col-sm mt-2\">
                    <button type=\"submit\" class=\"btn btn-primary\">Save</button>
                </div>
                
            </div></form>"
            // <div class=\"col-sm mt-2\">
            //         <button type=\"submit\" class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#newProduct\">Add
            //             product</button>
            //     </div>
        ?>

        <!-- Modal -->
        <div class="modal fade" id="newProduct" tabindex="-1" aria-labelledby="newProduct" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body flex align-items-center">
                        <div class="form-group row">
                            <div class="col-5">
                                <label for="new_product">Product name</label>
                                <select class="form-control product" name="product" id="new_product">
                                    <option value="0">Kiwi</option>
                                    <option value="1">Sirloin steak</option>
                                    <option value="2">Salmon</option>
                                </select>
                            </div>
                            <div class="col-3 form-group">
                                <label for="new_product_quantity">Quantity</label>
                                <input type="number" min="1" id="new_product_quantity" class="form-control quanity">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addNewProduct()">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
    <!-- end main cotainer -->
    <br>

    <!-- feedback form -->
    <?php include("../HTML/BackStoreFooter.html"); ?>
    <!-- end feedback form -->
    <br />

    <script rel="text/javascript" src="../JavaScript/OrderFunctionality.js"></script>
</body>

</html>
<?php 
    session_start();
    include('../HTML/OrderList.html'); 
    include('orderFunctionality.php');
?>

<body>
    <!-- navbar -->
    <?php include("BackStoreNavBar.php"); ?>
    <!-- end navbar -->
    </br>

    <div class="container">
        <div class="jumbotron text-center title">
            <h1 class="h1"><span style="color: #ffed00">O</span>rder List</h1>
        </div>
    </div>


    <!-- This is to add new test order -->
    <!-- <button type="button" class="btn btn-primary left-0 mb-1" onclick="addTestRow()">
        Add New Test Order
    </button> -->

    <!-- main container -->
    <div class="jumbotron text-center" style="background-color: #e9ecef; padding: 2%;">
        <div class="table-responsive">

            <table id="order_table" class="table table-striped table-dark">

                <thead>
                    <tr>
                        <th scope="col">ID#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Cart Total</th>
                        <th scope="col">Items quanity</th>
                        <th scope="col">Purchase time</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $orders = readOrders();
                    foreach ($orders as $order) {
                    // var_dump($order);
                        echo "
                    <td scope=\"row\" class=\"id\">{$order['id']}</td>
                        <td scope=\"row\" class=\"first_name\">{$order['user']['firstname']}</td>
                        <td scope=\"row\" class=\"last_name\">{$order['user']['lastname']}</td>
                        <td scope=\"row\">C$ <span class=\"cart_total\">{$order['cart-total']}</span></td>
                        <td scope=\"row\" class=\"item_quanity\">{$order['quanity']}</td>
                        <td scope=\"row\">{$order['time']}</td>
                        <td scope=\"row\" class=\"address\">{$order['user']['address']}</td>
                        <td scope=\"row\">
                            <a type=\"button\" href=\"/Back%20Store/PHP/EditOrderProfile.php?id={$order['id']}\" class=\"btn btn-success m-1\" style=\"color: white\">
                                Edit
                            </a>
                            <button type=\"button\" class=\"btn btn-danger m-1\"
                                onclick=\"deleteOrder($(this).closest('tr'))\">
                                Delete
                            </button>
                        </td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <!-- <div class="modal fade" id="editOrder" tabindex="-1" aria-labelledby="editOrder" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modify Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body flex align-items-center">
                    <span class="index" style="display: none;"></span>
                    <div class="container">
                        <div class="row mb-1 text-center">It is your responsability to ensure that entered modification
                            are correct
                        </div>
                        <div class="row form-group">
                            <label for="id">Id</label>
                            <input type="number" disabled min="0" name="id" class="form-control">
                        </div>
                        <div class="row form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" required placeholder="John" name="first_name" class="form-control">
                        </div>
                        <div class="row form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" required placeholder="Smith" name="last_name" class="form-control">
                        </div>
                        <div class="row form-group">
                            <label for="cart_total">Cart Total</label>
                            <input type="number" required min="0" placeholder="100" name="cart_total" class="form-control">
                        </div>
                        <div class="row form-group">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" required class="form-control">
                                <option value="CC">Credit Card</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="row form-group">
                            <label for="item_quanity">Items Quanity</label>
                            <input type="number" required min="0" name="item_quanity" class="form-control">
                        </div>
                        <div class="row form-group">
                            <label for="address">Address</label>
                            <input type="text" required placeholder="123 ave. Manhatten, NY" name="address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveUpdated()">Save</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end modal -->

    <!-- end main container -->
    </br>
    </br>

    <!-- feedback form -->
    <?php include("../HTML/BackStoreFooter.html"); ?>
    <!-- end feedback -->
    <br />
    <script rel="text/javascript" src="../JavaScript/OrderFunctionality.js"></script>
</body>

</html>
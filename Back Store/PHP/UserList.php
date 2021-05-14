<?php
    include("CheckUser.php");
    include("../HTML/UserListHead.html");
    include("EditUserDataList.php");
?>

<body>

<?php
    include("BackStoreNavBar.php");
?>

<br/>

<div class="container">
    <div class="jumbotron text-center title">
        <h1 class="h1"><span style="color: #ffed00">U</span>ser List</h1>
    </div>
</div>

<button type="button" class="btn btn-primary" onclick="window.location.href = '../PHP/EditUserProfile.php?action=add';">Add</button>

<br/>
<br/>

<form action="">

    <div class="table-responsive">

        <table class="table table-striped table-dark" id="userListTable">

            <thead>
                <tr>
                    <th scope="col">ID#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody id="userListTableBody">

            </tbody>

        </table>
    </div>
</form>

<?php
    loadTable();
?>

<br/>

<?php
include("../HTML/BackStoreFooter.html");
?>

<br/>
</body>
</html>

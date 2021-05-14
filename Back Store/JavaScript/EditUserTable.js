function addRow(userProfile) {

    //get the table element from the document by id
    let tableBodyNode = document.getElementById("userListTableBody");

    //Crating a new row <tr> element
    let rowNode = document.createElement("tr");

    //Adding the id head node <th>
    let idNode = document.createElement("th");
    idNode.scope = "row";
    idNode.setAttribute("name", "id");
    idNode.innerHTML = userProfile.id;
    rowNode.appendChild(idNode);

    //Adding FirstName Node <td>
    let firstNameNode = document.createElement("td");
    firstNameNode.setAttribute("name", "firstName");
    firstNameNode.innerHTML = userProfile.firstName;
    rowNode.appendChild(firstNameNode);

    //Adding LastName Node <td>
    let lastNameNode = document.createElement("td");
    lastNameNode.setAttribute("name", "lastName");
    lastNameNode.innerHTML = userProfile.lastName;
    rowNode.appendChild(lastNameNode);

    //Adding Email Node <td>
    let emailNode = document.createElement("td");
    emailNode.setAttribute("name", "email");
    emailNode.innerHTML = userProfile.email;
    rowNode.appendChild(emailNode);

    //Adding PhoneNumber Node <td>
    let phoneNumberNode = document.createElement("td");
    phoneNumberNode.setAttribute("name", "phoneNumber");
    phoneNumberNode.innerHTML = userProfile.phoneNumber;
    rowNode.appendChild(phoneNumberNode);

    //Adding Address Node <td>
    let addressNode = document.createElement("td");
    addressNode.setAttribute("name", "address");
    addressNode.innerHTML = userProfile.address;
    rowNode.appendChild(addressNode);

    //Adding the Actions
    let editButtonNode = document.createElement("button");
    editButtonNode.type = "button";
    editButtonNode.className = "btn btn-success";
    editButtonNode.style.color = "white";
    editButtonNode.setAttribute("name", "editBtn");
    editButtonNode.onclick = function() { window.location.href= '../PHP/EditUserProfile.php?action=edit&id='+this.parentNode.parentNode.cells[0].innerHTML; };
    editButtonNode.innerHTML = "Edit";

    let deleteButtonNode = document.createElement("button");
    deleteButtonNode.type = "button";
    deleteButtonNode.className = "btn btn-danger";
    deleteButtonNode.setAttribute("name", "deleteBtn");
    deleteButtonNode.onclick = function() { deleteUser(this.parentNode.parentNode); };
    // deleteButtonNode.href=('../PHP/EditUserDataList.php?delete=true&id=' + this.parentNode.parentNode.cells[0].innerHTML);
    deleteButtonNode.innerHTML = "Delete";

    let spaceTextNode = document.createTextNode("\u00A0");
    spaceTextNode.textContent = " ";

    let actionsNode = document.createElement("td");
    actionsNode.appendChild(editButtonNode);
    actionsNode.appendChild(spaceTextNode);
    actionsNode.appendChild(deleteButtonNode);

    rowNode.append(actionsNode);

    //Appending the row to the table
    tableBodyNode.appendChild(rowNode);

}


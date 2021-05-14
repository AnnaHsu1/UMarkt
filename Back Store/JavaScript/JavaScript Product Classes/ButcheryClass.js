class Product {

    constructor(id, image, item, price, category, quantity, availability, deal, description) {
        this.id = id;
        this.image = image;
        this.item = item;
        this.price = price;
        this.category = category;
        this.quantity = quantity;
        this.availability = availability;
        this.deal=deal;
        this.description=description;
    }
}

function addRow(productDetails) {

    //get the table element from the document by id
    let tableBodyNode = document.getElementById("productTable");

    //Creating a new row <tr> element
    let rowNode = document.createElement("tr");

    //Adding the id head node <th>
    let idNode = document.createElement("th");
    idNode.scope = "row";
    idNode.setAttribute("name", "id");
    idNode.innerHTML = productDetails.id;
    rowNode.appendChild(idNode);

    //Adding image Node <td>
    let imageNode = document.createElement("td");
    let imageNode1 = document.createElement("img");
    imageNode.setAttribute("name", "image");
    imageNode1.src = productDetails.image;
    imageNode1.width=150;
    imageNode1.height=115;
    imageNode.appendChild(imageNode1);
    rowNode.appendChild(imageNode);

    //Adding item name Node <td>
    let itemNode = document.createElement("td");
    itemNode.setAttribute("name", "item");
    itemNode.innerHTML = productDetails.item
    rowNode.appendChild(itemNode);

    //Adding price Node <td>
    let priceNode = document.createElement("td");
    priceNode.setAttribute("name", "price");
    priceNode.innerHTML = productDetails.price;
    rowNode.appendChild(priceNode);

    //Adding category Node <td>
    let categoryNode = document.createElement("td");
    categoryNode.setAttribute("name", "category");
    categoryNode.innerHTML = productDetails.category;
    rowNode.appendChild(categoryNode);

    //Adding quantity Node <td>
    let quantityNode = document.createElement("td");
    quantityNode.setAttribute("name", "quantity");
    quantityNode.innerHTML = productDetails.quantity;
    rowNode.appendChild(quantityNode);

    //Adding availability Node <td>
    let availabilityNode = document.createElement("td");
    availabilityNode.setAttribute("name", "availability");
    availabilityNode.innerHTML = productDetails.availability;
    rowNode.appendChild(availabilityNode);

    //Adding deal Node <td>
    let dealNode = document.createElement("td");
    dealNode.setAttribute("name", "deal");
    if(productDetails.deal===null)
        dealNode.innerHTML ="Not This Week";
    else if(productDetails.deal==="true" || productDetails.deal==="True")
    {
        dealNode.innerHTML = "On-SALE";
        dealNode.style.color="red";
        dealNode.style.fontWeight="bolder";
    }
    else dealNode.innerHTML = "Not This Week";
    rowNode.appendChild(dealNode);

    //Adding description Node <td>
    let descriptionNode = document.createElement("td");
    descriptionNode.setAttribute("name", "description");
    descriptionNode.innerHTML = productDetails.description;
    rowNode.appendChild(descriptionNode);
    //Adding the Actions
    let editButtonNode = document.createElement("button");
    editButtonNode.type = "button";
    editButtonNode.className = "btn btn-success";
    editButtonNode.style.color = "white";
    editButtonNode.setAttribute("name", "editBtn");
    editButtonNode.onclick = function() { window.location.href= '../EditProducts/EditButchery.php?id='+this.parentNode.parentNode.cells[0].innerHTML; };
    editButtonNode.innerHTML = "Edit";

    let deleteButtonNode = document.createElement("button");
    deleteButtonNode.type = "button";
    deleteButtonNode.className = "btn btn-danger";
    deleteButtonNode.setAttribute("name", "deleteBtn");
    deleteButtonNode.onclick = function() { deleteItem(this.parentNode.parentNode); };
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

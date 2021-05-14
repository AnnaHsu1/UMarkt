const products = {
  0: {
    'name': 'Kiwis', 'price': 1.29, 'category': 'Fruits and Vegetables'
  },
  1: {
    'name': 'Sirloin Steak', 'price': 8.53, 'category': 'Butchery'
  },
  2: {
    'name': 'Salmon', 'price': 7.85, 'category': 'SeaFood'
  }
}

function addQuanity (data) {
  let value = parseInt(data.children('.value').html()) + 1
  data.children('.value').html(value)
  console.log(data.children('.value'))
  data.children('.input')[0].value = parseInt(value)
  console.log(data.children('.input')[0], value)


  calculateQuanity();
  calculateTotal();
}

function removeQuanity (data) {
  let quanity = parseInt(data.children('.value').html()) - 1
  data.children('.value').html(quanity)

  if (quanity <= 0) {
    data.closest('tr').remove()
  }

  calculateQuanity();
  calculateTotal();
}

function calculateTotal () {
  let rows = Array.from(document.querySelectorAll('.table tr'))
  rows.shift() // remove headers

  let total = rows.reduce(function (previous, current) {
    let price = parseFloat(current.querySelector('.product-price').innerText)
    let quanity = parseInt(current.querySelector('.quanity > .value').innerText)
    return previous + (price * quanity)
  }, 0)

  console.log(total)

  // document.querySelector('.total .price').innerText = total.toFixed(2)
  document.getElementById('cart-total').value = total.toFixed(2)
}

function calculateQuanity () {
  let quanity = Array.from(document.querySelectorAll('.table tr .quanity .value')).reduce((prev, curr) => parseFloat(curr.innerText) + prev, 0)

  document.querySelector('.total .quanity').innerText = quanity
}

function addNewProduct () {
  let table = document.getElementById('product_table')
  let modal = document.getElementById('newProduct')
  let product = parseInt(modal.getElementsByClassName('product')[0].value)
  let quanity = parseInt(modal.getElementsByClassName('quanity')[0].value)
  let newRow = table.insertRow()


  let cell1 = newRow.insertCell(0)
  cell1.innerText = products[product].name
  let cell2 = newRow.insertCell(1)
  cell2.innerHTML = `<span class="product-price">${products[product].price}</span>$/each`
  let cell3 = newRow.insertCell(2)
  cell3.innerText = products[product].category
  let cell4 = newRow.insertCell(3)
  cell4.classList.add('quanity')
  cell4.innerText = quanity
  let cell5 = newRow.insertCell(4)
  cell5.innerHTML = `<td>
  <button type="button" onclick="addQuanity($(this).closest('tr').children('.quanity'))" class="btn btn-primary">Add</button>
  <button type="button" onclick="removeQuanity($(this).closest('tr').children('.quanity'))" class="btn btn-danger">Delete</button>
  </td>`

  $('#newProduct').modal('hide')
  calculateQuanity();
  calculateTotal();
}

function addTestRow () {
  let table = document.getElementById('order_table')
  let newRow = table.insertRow()

  let cell0 = newRow.insertCell(0)
  cell0.classList.add('id')
  cell0.innerText = '0000'
  let cell1 = newRow.insertCell(1)
  cell1.classList.add('first_name')
  cell1.innerText = 'Scrooge'
  let cell2 = newRow.insertCell(2)
  cell2.classList.add('last_name')
  cell2.innerText = 'McDuck'
  let cell3 = newRow.insertCell(3)
  cell3.innerHTML = 'C$ <span class="cart_total">101.58</span>'
  let cell4 = newRow.insertCell(4)
  cell4.classList.add('payment_method')
  cell4.innerText = 'Cash'
  let cell5 = newRow.insertCell(5)
  cell5.classList.add('item_quanity')
  cell5.innerText = 67
  let cell6 = newRow.insertCell(6)
  cell6.innerText = '17:45:56'
  let cell7 = newRow.insertCell(7)
  cell7.classList.add('address')
  cell7.innerText = 'Duckburg, Calisota'
  let cell8 = newRow.insertCell(8)
  cell8.innerHTML = `<button type="button" class="btn btn-success m-1" style="color: white"
  onclick="modifyOrder($(this).closest('tr'))" data-toggle="modal"
  data-target="#editOrder">
  Edit
</button>
<button type="button" class="btn btn-danger m-1"
  onclick="deleteOrder($(this).closest('tr'))">
  Delete
</button>`
}

function modifyOrder (selected) {
  console.log('test')
  let row = selected[0]
  let modal = document.getElementById('editOrder')
  let rowData = {
    'id': parseInt(row.getElementsByClassName('id')[0].innerText),
    'first_name': row.getElementsByClassName('first_name')[0].innerText,
    'last_name': row.getElementsByClassName('last_name')[0].innerText,
    'cart_total': parseFloat(row.getElementsByClassName('cart_total')[0].innerText),
    'payment_method': row.getElementsByClassName('payment_method')[0].innerText,
    'item_quanity': parseInt(row.getElementsByClassName('item_quanity')[0].innerText),
    'address': row.getElementsByClassName('address')[0].innerText,
  }

  // set modal
  modal.querySelector('.index').innerText = row.rowIndex
  modal.querySelector('[name="id"]').value = rowData.id
  modal.querySelector('[name="first_name"]').value = rowData.first_name
  modal.querySelector('[name="last_name"]').value = rowData.last_name
  modal.querySelector('[name="cart_total"]').value = rowData.cart_total
  modal.querySelector('[name="payment_method"]').value = rowData.payment_method
  modal.querySelector('[name="item_quanity"]').value = rowData.item_quanity
  modal.querySelector('[name="address"]').value = rowData.address
}

function deleteOrder (selected) {
  let index = selected[0].rowIndex
  let answer = confirm(`Are you sure you want to delete order row #${index}`)

  if (answer) {
    $.ajax({
      url: "/Back%20Store/PHP/orderFunctionality.php",
      type: "post",
      data: { delete: "true", id: selected[0].cells[0].innerHTML }
      //"delete=true&id=U" + userToDelete.cells[0].innerHTML
    });

    let table = document.getElementById('order_table')
    table.deleteRow(index)
  }
}

function saveUpdated () {
  let modal = document.getElementById('editOrder')
  let rows = Array.from(document.getElementsByTagName("tr"))

  let modalData = {
    'index': parseInt(modal.querySelector('.index').innerText),
    'id': modal.querySelector('[name="id"]').value,
    'first_name': modal.querySelector('[name="first_name"]').value,
    'last_name': modal.querySelector('[name="last_name"]').value,
    'cart_total': modal.querySelector('[name="cart_total"]').value,
    'payment_method': modal.querySelector('[name="payment_method"]').value,
    'item_quanity': modal.querySelector('[name="item_quanity"]').value,
    'address': modal.querySelector('[name="address"]').value,
  }

  rows[modalData.index].querySelector('.id').innerText = modalData.id
  rows[modalData.index].querySelector('.first_name').innerText = modalData.first_name
  rows[modalData.index].querySelector('.last_name').innerText = modalData.last_name
  rows[modalData.index].querySelector('.cart_total').innerHTML = `C$ <span class="cart_total">${modalData.cart_total}</span>`
  rows[modalData.index].querySelector('.payment_method').innerText = modalData.payment_method
  rows[modalData.index].querySelector('.item_quanity').innerText = modalData.item_quanity
  rows[modalData.index].querySelector('.address').innerText = modalData.address

  $('#editOrder').modal('hide');
}

function formatAMPM (date) { // This is to display 12 hour format like you asked
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0' + minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}

// var myDate = new Date();
// var displayDate = myDate.getMonth()+ '/' +myDate.getDate()+ '/' +myDate.getFullYear()+ ' ' +formatAMPM(myDate);
// console.log(displayDate);
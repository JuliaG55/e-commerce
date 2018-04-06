
window.onload = function () {
	window.axios = axios

	let nav = document.getElementById('cart-count')
	nav.innerText = Cart.count()

  printCart()

	axios.get('/api/bikes.php').then(({ data }) => { window.bikes = data })
}

function printCart () {
  let list = document.getElementById('cart-list')
  list.innerHTML = ''

  for (bike of Cart.all()) {
    list.innerHTML += '<div><img width="200px" src="' + bike.image + '" />' + bike.name + '&mdash;' + bike.price + ' <button class="clear-cart" onclick="Cart.remove(\'' + bike.name + '\'); printCart();">Remove</button></div>'
  }
}

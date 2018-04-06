
window.Cart = {

	add: function (bike) {  //Add one item to the cart.
		this._write(
			this._read().concat([bike])
		)
	},

	all: function (bike) {  // Returns all items in the cart.
		return this._read()
	},

	count () {	// Counts the items in the cart.
		return this._read().length
	},

	_read () {	// Reads the JSON from the local storage.
		return window.localStorage.cart === undefined
			? []
			: JSON.parse(window.localStorage.cart)
	},

	_write: function (data) {	// Rewrites the items in cart.
		window.localStorage.cart = JSON.stringify(data)
	},

  remove (name) {	// Removes one item from the cart.
    this._write(this._read().filter(bikes => bikes.name !== name))
  },

  clear () { 	// Clears all items from the cart.
    this._write([])
  }
}

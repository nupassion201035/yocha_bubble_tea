<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart Example</title>
</head>
<body>
    <h2>Add Item to Cart</h2>
    <form id="cartForm">
        <label for="pro_id">Product ID:</label>
        <input type="text" id="pro_id" name="pro_id"><br>
        <label for="check_toppings">Toppings:</label>
        <input type="text" id="check_toppings" name="check_toppings"><br>
        <label for="size_selection">Size:</label>
        <input type="text" id="size_selection" name="size_selection"><br>
        <label for="id_toppings">Toppings ID:</label>
        <input type="text" id="id_toppings" name="id_toppings"><br>
        <button type="button" onclick="addToCart()">Add to Cart</button>
    </form>

    <h2>Cart</h2>
    <ul id="cartItems"></ul>

    <script>
        // Function to add an item to the cart
        function addToCart() {
            // Get form data
            var pro_id = document.getElementById('pro_id').value;
            var check_toppings = document.getElementById('check_toppings').value;
            var size_selection = document.getElementById('size_selection').value;
            var id_toppings = document.getElementById('id_toppings').value;

            // Create new cart item object
            var newItem = {
                pro_id: pro_id,
                check_toppings: check_toppings,
                size_selection: size_selection,
                id_toppings: id_toppings
            };

            // Retrieve existing cart items from local storage
            var cartItems = localStorage.getItem('cart');
            if (cartItems) {
                cartItems = JSON.parse(cartItems);
            } else {
                cartItems = [];
            }

            // Add new item to cart
            cartItems.push(newItem);

            // Save updated cart items to local storage
            localStorage.setItem('cart', JSON.stringify(cartItems));

            // Refresh cart display
            displayCart();
        }

        // Function to display the cart
        function displayCart() {
            var cartItems = localStorage.getItem('cart');
            var cartItemsList = document.getElementById('cartItems');

            // Clear existing items in the list
            cartItemsList.innerHTML = '';

            // Check if cart is empty
            if (!cartItems) {
                cartItemsList.innerHTML = 'Cart is empty';
                return;
            }

            // Parse cart items and display them
            cartItems = JSON.parse(cartItems);
            cartItems.forEach(function(item) {
                var listItem = document.createElement('li');
                listItem.textContent = "ID drink: " + item.pro_id + ", ID topping: " + item.check_toppings + ", Price: " + item.size_selection;
                cartItemsList.appendChild(listItem);
            });
        }

        // Display cart on page load
        displayCart();
    </script>
</body>
</html>

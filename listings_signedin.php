<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>UrbanFabric</title>
    <link rel="stylesheet" type="text/css" href="cartbutton.css">
	<link rel="stylesheet" type="text/css" href="cartToast.css">
	<style>
        
		* {
			margin: 0;
			padding: 0;
		}
nav {
    width: 100%;
    height: 100px;
    background-color: rgb(208, 183, 192);;
}

ul li{
    list-style: none;
    display: inline-block;
    float: left;
    line-height: 100px;
}

ul li a{
    text-decoration: none;
    font-size: 14px;
    font-family: arial;
    padding: 0 20px;
    color:black
}

ul li a:hover {
    color: red;
}

		body {
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
		}
		.item {
			display: inline-block;
			margin: 15px;
			padding: 20px;
			border: 1px solid #ccc;
			text-align: center;
			width: 200px;
		}
		.item img {
			max-width: 100%;
			height: 225px;
			
		}
		.item button {
			display: block;
			margin: 10px auto;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
		.item button:hover {
			background-color: #3e8e41;
		}
		.cart {
			margin-top: 50px;
			text-align: center;
		}
		.cart h2 {
			margin-bottom: 20px;
		}
		.cart ul {
			list-style: none;
			padding: 0;
		}
		.cart li {
			margin-bottom: 10px;
		}
		.cart a {
			display: inline-block;
			margin-top: 10px;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			text-decoration: none;
		}
		.cart a:hover {
			background-color: #3e8e41;
		}
	</style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
</head>
<body>
    <nav>
        <ul>
          <li><a href="homepage_signedin.html">Home</a></li>
          <li><a href="listings_signedin.php">Products</a></li>
		  <li style="float: right;"><a href="homepage.html">Sign Out</a></li>
          <li style="float: right;"><a href="cart.php">Shopping Cart</a></li>
        </ul>
    </nav>
	<h1>Products</h1>
	<div class="item">
		<img src="item1.png" alt="Item 1">
		<h2>Golf Polo Shirts for Men</h2>
		<p>$20</p>
		<button class="add-to-cart" data-id="1">Add to Cart</button>
	</div>
	<div class="item">
		<img src="item2.png" alt="Item 2">
		<h2>Leather Casual Slip on Loafers</h2>
		<p>$30</p>
		<button class="add-to-cart" data-id="2">Add to Cart</button>
	</div>
	<div class="item">
		<img src="item3.png" alt="Item 3">
		<h2>Cotton Long sleeve shirt</h2>
		<p>$25</p>
		<button class="add-to-cart" data-id="3">Add to Cart</button>
	</div>
	<div class="item">
		<img src="item4.png" alt="Item 4">
		<h2>Womens slim fit shirts</h2>
		<p>$25</p>
		<button class="add-to-cart" data-id="4">Add to Cart</button>
	</div>
	<div class="item">
		<img src="item5.png" alt="Item 5">
		<h2>Womens Dolman top</h2>
		<p>$10</p>
		<button class="add-to-cart" data-id="5">Add to Cart</button>
	</div>
	<div class="item">
		<img src="item6.png" alt="Item 6">
		<h2>Sneakers for Women</h2>
		<p>$40</p>
		<button class="add-to-cart" data-id="6">Add to Cart</button>
	</div>
	<div class="item">
		<img src="item7.png" alt="Item 7">
		<h2>Golf hat</h2>
		<p>$10</p>
		<button class="add-to-cart" data-id="7">Add to Cart</button>
	</div>
	<div class="item">
		<img src="item8.png" alt="Item 8">
		<h2>Gamerverse Hoodie for Men</h2>
		<p>$10</p>
		<button class="add-to-cart" data-id="8">Add to Cart</button>
	</div>
	<div id="snackbar">Item added to the cart!</div>
    <script>
    var addToCartButtons = document.querySelectorAll(".add-to-cart");
    var cartItems = localStorage.getItem("cartItems");
    if (cartItems) {
    cartItems = JSON.parse(cartItems);
    updateCart();
    } else {
    cartItems = [];
    }
    addToCartButtons.forEach(function(button) {
		button.addEventListener("click", function() {
			var itemId = button.getAttribute("data-id");
			var item = {
				id: itemId,
				name: button.parentNode.querySelector("h2").textContent,
				price: button.parentNode.querySelector("p").textContent
			};
			cartItems.push(item);
			//localStorage.setItem("cartItems", JSON.stringify(cartItems));
            //$.cookie('cartItems', JSON.stringify(cartItems), { expires: 7, path: '/' });
            document.cookie = "cartItems="+JSON.stringify(cartItems)+"; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";

            // <?php
            //     // setcookie('cartItems', $value, time()+3600);
            //     //setcookie("cartItems",$_COOKIE['cartItems'] = $cartItems, time()+60*60*24*5);
            // ?>
			updateCart();
			cartToast();
		});
	});

	function updateCart() {
		var cartList = document.getElementById("cart-items");
		cartList.innerHTML = "";
		cartItems.forEach(function(item) {
			var listItem = document.createElement("li");
			listItem.textContent = item.name + " - " + item.price;
			cartList.appendChild(listItem);
		});
	}
	function cartToast() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Cart - Cart Summary</title>
    <link rel="stylesheet" type="text/css" href="homepage.css" />
	<link rel="stylesheet" type="text/css" href="cartToast.css">
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		nav {
			width: 100%;
			height: 100px;
			background-color: rgb(208, 183, 192);
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

  
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
		}
		h1, h2 {
			margin-top: 0;
		}
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
			border: 1px solid #ccc;
			text-align: left;
		}
		th {
			background-color: #f2f2f2;
		}
		.total {
			font-weight: bold;
			text-align: right;
		}
		button {
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
		button:hover {
			background-color: #3e8e41;
		}
	</style>
    <!-- <script>
        // Load cart items from local storage
	    var cartItems = JSON.parse(localStorage.getItem('cartItems'));

        // Save cart items to cookie for PHP to access
        document.cookie = 'cartItems=' + JSON.stringify(cartItems);
    </script> -->
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
	<div class="container">
		<h1>Shopping Cart - Summary</h1>
		<?php
            function findItemById($cartItems, $id) {
                foreach ($cartItems as $item) {
                  if ($item['id'] == $id) {
                    return $item;
                  }
                }
                return null;
              }
			// Get the cart items from local storage
			//$cartItems = json_decode($_COOKIE['cartItems'], true);
            $cartItems = isset($_COOKIE['cartItems']) ? json_decode(stripslashes($_COOKIE['cartItems']), true) : array();
			if (!$cartItems) {
				echo "<p>Your cart is empty.</p>";
			} else {
				// Build an array of unique item IDs with counts
				$itemCounts = array();
				foreach ($cartItems as $item) {
					if (array_key_exists($item['id'], $itemCounts)) {
						$itemCounts[$item['id']]++;
					} else {
						$itemCounts[$item['id']] = 1;
					}
				}
				// Display the cart items as a table
				echo "<table>";
				echo "<tr><th>Item</th><th>Price per piece</th><th>Quantity</th><th>Items Price</th></tr>";
				$total = 0;
                $itemsDesc = "";
				foreach ($itemCounts as $itemId => $count) {
					$item = findItemById($cartItems,$itemId); 
                    // error_log(print_r("ITem 1 : ", TRUE)); 
                    // error_log(print_r($item, TRUE)); 
					echo "<tr>";
					echo "<td>" . $item['name'] . "</td>";
					echo "<td>" . $item['price'] . "</td>";
					echo "<td>" . $count . "</td>";
                    echo "<td>&dollar;" .ltrim($item['price'],'$')*$count . "</td>";
					echo "</tr>";
					$total += ltrim($item['price'],'$') * $count;
                    $itemsDesc = $itemsDesc." ".$item['name']." <b>x".$count."</b>,  ";
				}
				$itemsDesc = rtrim($itemsDesc,", ");
				echo "<tr><td colspan='3' class='total'>Total:</td><td>&dollar;" . $total . "</td></tr>";
				echo "</table>";
				echo "<button onclick='document.cookie = \"itemsDesc = $itemsDesc\"; placeOrder();'>Place Order</button>";
				echo "<div id=\"snackbar\">Order successful!</div>";
			}
		?>
	</div>
	<script>
        
		function placeOrder() {
            var newOrder = document.cookie.split("; ").find((row) => row.startsWith("itemsDesc="))?.split("=")[1];
            var newItem = {
            id: 1,
            Orderdesc: newOrder
            };
            //var itemsDesc = JSON.parse()
            var existingitems = document.cookie.split("; ").find((row) => row.startsWith("orders="))?.split("=")[1];
            if(existingitems){
                var existingOrders = JSON.parse(existingitems);
                existingOrders.push(newItem);
            }
            else{
                var existingOrders = [newItem];
            }
            
            //var existingOrders ;//= JSON.parse();
            
            // if(existingOrders){
            //     existingOrders.push(newItem);
            // }
            // else{
            //     existingOrders = [newItem];
            // }
            document.cookie = "orders="+JSON.stringify(existingOrders);
			var x = document.getElementById("snackbar");
			x.className = "show";
			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
			window.location.href = "orders.php";
		}
	</script>
</body>
</html>

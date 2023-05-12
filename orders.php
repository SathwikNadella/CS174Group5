<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		p{
			margin: 15px;
			padding: 15px;
		}
		h1{
			display: inline-block;
			align:left;
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

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
		}

		.empty {
			text-align: center;
			font-style: italic;
			color: #999;
			margin-top: 20px;
		}
	</style>
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
	<h1>Orders</h1>

	<p>Your order has been placed successfully. Here's a list of your previous orders.</p>

	<?php
		$orders = json_decode($_COOKIE['orders'], true);

		if (!empty($orders)) {
			echo '<table>';
			echo '<tr><th>Order Description</th></tr>';

			foreach ($orders as $order) {
				echo '<tr>';
				// echo '<td>' . $order['id'] . '</td>';
				echo '<td>' . $order['Orderdesc'] . '</td>';
				echo '</tr>';
			}

			echo '</table>';
		} else {
			echo '<p class="empty">You have no previous orders.</p>';
		}
	?>

</body>
</html>

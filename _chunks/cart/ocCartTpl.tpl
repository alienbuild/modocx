Cart Placeholders: 
<br>
Weight: [[+weight]]
<br>
Coupon Status: [[+coupon_status]]
<br>
Coupon: [[+coupon]]
<br>
Voucher Status: [[+voucher_status]]
<br>
Voucher: [[+voucher]]
<br>
Reward Status: [[+reward_status]]
<br>
Reward: [[+reward]]
<br>
Total Count: [[+total_count]]
<br>
Total: [[+total]]
<br>
Total Raw: [[+total_raw]]
<br>
Total Product Count: [[+total_product_count]]
<br><br>

<h1>Shopping Cart ([[+weight]])
</h1>

<table class="table table-bordered">
	<thead>
		<tr>
			<td class="text-center">Image</td>
			<td class="text-left">Product Name</td>
			<td class="text-left">Model</td>
			<td class="text-left">Quantity</td>
			<td class="text-right">Unit Price</td>
			<td class="text-right">Total</td>
		</tr>
	</thead>
	<tbody>
		[[+products]]
	</tbody>
</table>

<div class="row">
	<div class="col-sm-4 col-sm-offset-8">
		<table class="table table-bordered">
			<tbody>
				[[+totals]]
			</tbody>
		</table>
	</div>
</div>

<input type="submit" name="update-cart" value="update-cart">
<a href="[[~[[++opencart.checkout]]]]" class="btn btn-primary">Checkout</a>
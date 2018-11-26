<tr>
	<td class="text-center"> 
		<img src="[[+thumb]]" alt="[[+name]]" title="[[+name]]" class="img-thumbnail" width="50">
	</td>
	<td class="text-left">
		[[+name]]
		<br>
		<small>Reward Points: [[+reward]]</small> 
	</td>
	<td class="text-left">[[+model]]</td>
	<td class="text-left">
		<div class="input-group btn-block" style="max-width: 200px;">
			<input type="text" name="quantity[[+key]]" id="quantity" value="[[+quantity]]">
			<span class="input-group-btn">
				<input type="submit" name="update" value="update-[[+key]]">
				<input type="submit" name="delete" value="delete-[[+key]]">
			</span>
		</div>
	</td>
	<td class="text-right">[[+price]]</td>
	<td class="text-right">[[+total]]</td>
</tr>
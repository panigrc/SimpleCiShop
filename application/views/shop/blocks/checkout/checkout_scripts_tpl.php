<script type="text/javascript">
	function shipment_sum() {
		var text="";
		var cart_costs = parseFloat($("cart_costs").innerHTML);
		var sum = parseFloat($("shipment_costs").innerHTML);


		if ($("shipment_cash_on_delivery").checked) {
		    text+=" + ";
		    text+="<?= $this->lang->line('main_shipping_cash_on_delivery_costs') ?>";
		    sum+=parseFloat(<?= $this->lang->line('main_shipping_cash_on_delivery_costs') ?>);
		}
		text+=" = " + sum;
		$("shipment_sum").innerHTML = text;
		$("costs_sum").innerHTML = sum + " = " + (cart_costs + sum);
		$("price").value = (cart_costs + sum);
	}
</script>

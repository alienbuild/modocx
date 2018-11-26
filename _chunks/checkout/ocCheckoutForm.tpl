<form id="checkout-form" action="[[~[[*id]]]]" method="post">
    [[!ocLoginCheck? &tpl=`ocGuestLoginRegister`]]
    <input type="hidden" name="order-type" value="guest">
    
    [[$ocBillingDetails]]
    
    [[$ocDeliveryDetails]]
    
    [[$ocDeliveryMethod]]

</form>
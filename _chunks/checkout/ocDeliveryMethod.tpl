<div class="panel-body">
    <p>Please select the preferred shipping method to use on this order.</p>
    <p><strong>Flat Rate</strong></p>
    [[ocShippingMethods? &tpl=`shippingMethodsTpl`]]
    <div class="radio">
        <label>      
            <input name="shipping_method" value="flat.flat" checked="checked" type="radio">
            Flat Shipping Rate - £8.00
        </label>
    </div>
    <p><strong>Add Comments About Your Order</strong></p>
    <p>
        <textarea name="comment" rows="8" class="form-control"></textarea>
    </p>
    <div class="buttons">
        <div class="pull-right">
            <input value="Continue" id="button-shipping-method" data-loading-text="Loading..." class="btn btn-primary" type="button">
        </div>
    </div>
</div>
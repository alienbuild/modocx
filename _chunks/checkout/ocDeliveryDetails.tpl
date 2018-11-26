<div class="panel-body">
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-shipping-firstname">First Name</label>
        <div class="col-sm-10">
            <input name="shipping-firstname" value="[[!+fi.shipping-firstname]]" placeholder="First Name" id="input-shipping-firstname" class="form-control" type="text">
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-shipping-lastname">Last Name</label>
        <div class="col-sm-10">
            <input name="shipping-lastname" value="[[!+fi.shipping-lastname]]" placeholder="Last Name" id="input-shipping-lastname" class="form-control" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="input-shipping-company">Company</label>
        <div class="col-sm-10">
            <input name="shipping-company" value="[[!+fi.shipping-company]]" placeholder="Company" id="input-shipping-company" class="form-control" type="text">
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-shipping-address-1">Address 1</label>
        <div class="col-sm-10">
            <input name="shipping-address_1" value="[[!+fi.shipping-address_1]]" placeholder="Address 1" id="input-shipping-address-1" class="form-control" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="input-shipping-address-2">Address 2</label>
        <div class="col-sm-10">
            <input name="shipping-address_2" value="[[!+fi.shipping-address_2]]" placeholder="Address 2" id="input-shipping-address-2" class="form-control" type="text">
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-shipping-city">City</label>
        <div class="col-sm-10">
            <input name="shipping-city" value="[[!+fi.shipping-city]]" placeholder="City" id="input-shipping-city" class="form-control" type="text">
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-shipping-postcode">Post Code</label>
        <div class="col-sm-10">
            <input name="shipping-postcode" value="[[!+fi.shipping-postcode]]" placeholder="Post Code" id="input-shipping-postcode" class="form-control" type="text">
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-shipping-country">Country</label>
        <div class="col-sm-10">
            <select name="shipping-country_id" id="input-shipping-country" value="[[!+fi.shipping-country_id]]" class="form-control"> 
                [[ocGetCountries? &tpl=`ocCountries`]]
            </select>
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-shipping-zone">Region / State</label>
        <div class="col-sm-10">
            <select name="shipping-zone_id" id="input-shipping-zone" value="[[!+fi.shipping-zone_id]]" class="form-control">
                <!-- Zone Snippet -->
            </select>
        </div>
    </div>
    <div class="buttons">
        <div class="pull-right">
            <input value="Continue" id="button-guest-shipping" data-loading-text="Loading..." class="btn btn-primary" type="button">
        </div>
    </div>
</div>
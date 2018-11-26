<div class="panel-body">
  <div class="row">
    <div class="col-sm-6">
      <fieldset id="account">
        <legend>Your Personal Details</legend>
        <div class="form-group" style="display: none;">
          <label class="control-label">Customer Group</label>
          <div class="radio">
            <label>
              <input type="radio" name="customer_group_id" value="1" checked="checked">
              Default
            </label>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-firstname">First Name</label>
          <input type="text" name="firstname" value="[[!+fi.firstname]]" placeholder="First Name" id="input-payment-firstname" class="form-control">
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-lastname">Last Name</label>
          <input type="text" name="lastname" value="[[!+fi.lastname]]" placeholder="Last Name" id="input-payment-lastname" class="form-control">
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-email">E-Mail</label>
          <input type="text" name="email" value="[[!+fi.email]]" placeholder="E-Mail" id="input-payment-email" class="form-control">
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-telephone">Telephone</label>
          <input type="text" name="telephone" value="[[!+fi.telephone]]" placeholder="Telephone" id="input-payment-telephone" class="form-control">
        </div>
      </fieldset>
    </div>
    <div class="col-sm-6">
      <fieldset id="address" class="required">
        <legend>Your Address</legend>
        <div class="form-group">
          <label class="control-label" for="input-payment-company">Company</label>
          <input type="text" name="company" value="[[!+fi.company]]" placeholder="Company" id="input-payment-company" class="form-control">
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-address-1">Address 1</label>
          <input type="text" name="address_1" value="[[!+fi.address_1]]" placeholder="Address 1" id="input-payment-address-1" class="form-control">
        </div>
        <div class="form-group">
          <label class="control-label" for="input-payment-address-2">Address 2</label>
          <input type="text" name="address_2" value="[[!+fi.address_2]]" placeholder="Address 2" id="input-payment-address-2" class="form-control">
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-city">City</label>
          <input type="text" name="city" value="[[!+fi.city]]" placeholder="City" id="input-payment-city" class="form-control">
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-postcode">Post Code</label>
          <input type="text" name="postcode" value="[[!+fi.postcode]]" placeholder="Post Code" id="input-payment-postcode" class="form-control">
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-country">Country</label>
          <select name="country_id" value="[[!+fi.country_id]]" id="input-payment-country" class="form-control">
            [[ocGetCountries? &tpl=`ocCountries`]] 
          </select>
        </div>
        <div class="form-group required">
          <label class="control-label" for="input-payment-zone">Region / State</label>
          <select name="zone_id" value="[[!+fi.zone_id]]" id="input-payment-zone" class="form-control">
          </select>
        </div>
      </fieldset>
    </div>
  </div>
  <div class="checkbox">
  <label>     <input name="shipping_address" value="1" checked="checked" type="checkbox">
        My delivery and billing addresses are the same.</label>
</div>
  <div class="buttons">
    <div class="pull-right">
      <button id="button-guest" class="btn btn-primary create-guest-user get-shipping-methods" data-loading-text="Loading...">Continue</button>
    </div>
  </div>
</div>
 <div class="panel-body">
    <div class="row">
      <div class="col-sm-6">
        <h2>New Customer</h2>
        <p>Checkout Options:</p>
        <div class="radio">
          <label>         
            <input type="radio" name="account" value="register" checked="checked">
            Register Account
          </label>
        </div>
        <div class="radio">
          <label>         
            <input type="radio" name="account" value="guest">
            Guest Checkout
          </label>
        </div>
        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
        <input type="button" value="Continue" id="button-account" data-loading-text="Loading..." class="btn btn-primary">
      </div>
      <div class="col-sm-6">
        <h2>Returning Customer</h2>
        <p>I am a returning customer</p>
        <div class="form-group">
          <label class="control-label" for="input-email">E-Mail</label>
          <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
        </div>
        <div class="form-group">
          <label class="control-label" for="input-password">Password</label>
          <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
          <a href="[[~[[++opencart.forgotten_password]]]]">Forgotten Password</a>
        </div>
        <input type="button" value="Login" id="button-login" data-loading-text="Loading..." class="btn btn-primary">
      </div>
    </div>
  </div>
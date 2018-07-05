<br/>
<div class="row">
  <div class="col col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">User Login</h3>
      </div>
      <div class="card-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        	<div class="form-group">
        		<label>Email</label>
        		<input type="text" name="email" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label>Password</label>
        		<input type="password" name="password" class="form-control" />
        	</div>
        	<input class="btn btn-primary" name="submit" type="submit" value="Submit" /><br/><br/>
          <span>New to Shareboard? </span><a href="<?php echo ROOT_URL; ?>users/register">SIGN UP</a>
        </form>
      </div>
    </div>
  </div>
  <div class="col col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">User Register</h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Create new account</h5>
        <form method="post" action="<?php echo ROOT_URL; ?>users/register">
        <div class="form-row">
          <div class="col">
            <input type="text" name="first_name" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <input type="text" name="last_name" class="form-control" placeholder="Last name">
          </div>
        </div><br/>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-row">
          <div class="col">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="col">
            <input type="password" name="password_repeat" class="form-control" placeholder=" Repeat Password">
          </div>
        </div><br/>
        <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
      </form>
      </div>
    </div>
  </div>
</div>

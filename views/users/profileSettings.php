<br/>
<div class="row">
  <div class="col col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Profile</h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Edit your personal data</h5>
        <form method="post" action="<?php echo ROOT_URL; ?>users/register">
        <div class="form-row">
          <div class="col">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="<?php echo $_SESSION['user_data']['first_name']; ?>">
          </div>
          <div class="col">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="<?php echo $_SESSION['user_data']['last_name']; ?>">
          </div>
        </div><br/>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['user_data']['email']; ?>">
        </div>
        <br/>
        <input class="btn btn-primary" name="update" type="submit" value="Update" />
      </form>
      </div>
    </div>
  </div>
  <div class="col col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Photo</h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Edit your profile photo</h5>
        <form method="post" action="<?php echo ROOT_URL; ?>users/register">
          <div id="text-center" style="background:url(img/girl2.jpeg)">
            <div id="drop-area" >
            </div>
          </div>

        <br/>
        <input class="btn btn-primary" name="update" type="submit" value="Update" />
      </form>
      </div>
    </div>
  </div>
</div>

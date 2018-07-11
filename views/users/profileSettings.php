<br/>
<div class="row">
  <div class="col col-md-6">
    <!-- Profile form -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Profile</h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Edit your personal data</h5>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
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
        <input class="btn btn-primary" name="update_personal_data" type="submit" value="Update Personal Data" />
      </form>
      </div>
    </div>
    <!-- end profile form -->
  </div>
  <div class="col col-md-6">
    <div class="row">
      <div class="col">
        <!-- Picture form -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Photo</h3>
          </div>
          <div class="card-body">
            <h5 class="card-title">Edit your profile photo</h5>
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
              <div id="text-center bck-text" style="background:url(img/girl2.jpeg)">
                <div id="drop-area" >
                  <input type="file" name="profile_image_upload" />
                </div>
              </div>
            <br/>
            <input class="btn btn-primary" name="update_profile_image" type="submit" value="Update Profile Photo" />
          </form>
          </div>
        </div>
        <!-- end picture form -->
      </div>
    </div><br/>
    <div class="row">
      <div class="col">
        <!-- Password form -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Password</h3>
          </div>
          <div class="card-body">
            <h5 class="card-title">Edit your password</h5>
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-row">
              <div class="col">
                <label>Old password</label>
                <input type="password" name="current_password" class="form-control">
              </div>
            </div><br/>
            <div class="form-row">
              <div class="col">
                <label>New password</label>
                <input type="password" name="new_password" class="form-control">
              </div>
              <div class="col">
                <label>Verify passowrd</label>
                <input type="password" name="repeat_password" class="form-control">
              </div>
            </div>
            <br/>
            <input class="btn btn-primary" name="update_password" type="submit" value="Update Password" />
          </form>
          </div>
        </div>
        <!-- end password form -->
      </div>
    </div>
  </div>
</div>

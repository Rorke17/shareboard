<div class="row profile-row-bg">
    <img src="<?php echo ROOT_URL; ?>assets/img/bg.jpg" class="img-fluid" alt="Profile Photo">
</div>
<div class="row profile-row-img">
  <div class="card profile-card">
    <img src="<?php echo ROOT_URL; ?>assets/img/girl.jpeg" class="rounded mx-auto d-block rounded-circle profile-img" alt="Profile Photo">
    <div class="card-body">
      <div class="card-title">
        <h4><?php echo $_SESSION['user_data']['first_name'].' '.$_SESSION['user_data']['last_name']; ?></h4>
      </div>
      <div class="card-text">
        place of residence
      </div>
      <div class="card-text">
        <small class="text-muted">Join Date</small>
      </div>
    </div>
  </div>
</div>

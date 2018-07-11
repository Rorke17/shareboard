<?php
class UserModel extends Model {

// ////////////////////////////////////////////////////////////////////
// Login and register functions
// 3 functions
// /////////////////////////////////////////////////////////////////////

//Simple validation forms and calling functions
  public function registration() {

    if(isset($_POST['signin'])) {
      if(!empty($_POST['email']) && !empty($_POST['password']))
          $this->login($_POST);
        else
          Messages::setMsg('Please Fill In All Fields', 'error');
    }

    if(isset($_POST['register'])) {
      if(!empty($_POST['first_name']) && !empty($_POST['last_name']) &&
         !empty($_POST['email']) && !empty($_POST['passowrd']) &&
         !empty($_POST['repeat_password']))
          $this->register($_POST);
      else
        Messages::setMsg('Please Fill In All Fields', 'error');
    }
    unset($_POST);
  }

//Register new users and save date to database
  public function register($post) {

    $password = password_hash($post['password'], PASSWORD_DEFAULT);

      if($post['first_name'] == '' || $post['last_name'] == '' || $post['email'] == '' || $post['password'] == '' || $post['password_repeat'] == '') {
        Messages::setMsg('Please Fill In All Fields', 'error');
        return;
      }

      if(!password_verify($password, $post['password_repeat'])) {
        Messages::setMsg('Those passwords did not match. Try again.', 'error');
        return;
      }

      //Insert into MySQL
      $this->query('INSERT INTO users (first_name, last_name, email, password) VALUES(:first_name, :last_name, :email, :password)');
      $this->bind(':first_name', $post['first_name']);
      $this->bind(':last_name', $post['last_name']);
      $this->bind(':email', $post['email']);
      $this->bind(':password', $password);
      $this->execute();
      //Verify
      if($this->lastInsertId()) {
        header('Location: '.ROOT_URL.'users/login');
      }
      return;
  }

//Login users to system
  public function login($post) {

      //Insert into MySQL
      $this->query('SELECT * FROM users WHERE email = :email');
      $this->bind(':email', $post['email']);

      $row = $this->single();
      if(password_verify($post['password'], $row['password'])) {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_data'] = array(
          "id"    => $row['id'],
          "first_name"  => $row['first_name'],
          "last_name"  => $row['last_name'],
          "email" => $row['email']
        );
        header('Location: '.ROOT_URL.'shares');
      } else {
        Messages::setMsg('Incorrect Login', 'error');
        return;
      }
  }

// ////////////////////////////////////////////////////////////////////
// Profile Seettings
// 4 functions
// /////////////////////////////////////////////////////////////////////

// Simple vaildation forms and calling functions
  public function profileSettings() {

    if(isset($_POST['update_personal_data'])) {
      if($_POST['first_name'] != $_SESSION['user_data']['first_name'] ||
         $_POST['last_name'] != $_SESSION['user_data']['last_name'] ||
         $_POST['email'] != $_SESSION['user_data']['email'])
        $this->profilePersonalData($_POST);
      else
        Messages::setMsg('You did not make any changes', 'error');
    }

    if(isset($_POST['update_profile_image'])) {
      if(!empty($_POST['profile_image_upload']))
        $this->profileImage($_POST);
      else
        Messages::setMsg('You do not choose a photo', 'error');
    }

    if(isset($_POST['update_password'])) {
      if(!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['repeat_password']))
        $this->profilePassword($_POST);
      else
        Messages::setMsg('Please Fill In All Fields', 'error');
    }
    unset($_POST);
  }

//Update personal date
//After updating function creat new session
  private function profilePersonalData($post) {

    if ($post['update_personal_data']) {
      $this->query('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id');
      $this->bind(':first_name', $post['first_name']);
      $this->bind(':last_name', $post['last_name']);
      $this->bind(':email', $post['email']);
      $this->bind(':id', $_SESSION['user_data']['id']);
      $this->execute();
      //Verify
      if($this->rowCount() > 0) {
        Messages::setMsg('Changes was succesfully saved.', 'success');

        $this->query('SELECT * FROM users WHERE email = :email');
        $this->bind(':email', $post['email']);
        $row = $this->single();

        unset($_SESSION['user_data']);

        $_SESSION['user_data'] = array(
          "id"    => $row['id'],
          "first_name"  => $row['first_name'],
          "last_name"  => $row['last_name'],
          "email" => $row['email']
        );
      } else {
        Messages::setMsg('Something went wrong.', 'error');
      }
    }
  }

//Upload the file to the server
  private function profileImage($post) {
    // Check if image file is a actual image or fake image
    if ($post['update_profile_image']) {
      if (getimagesize($_FILES['profile_image_upload']['tmp_name']) == false) {
        Messages::setMsg('This is not an image.', 'error');
        return false;
      }
    }
      $targetDir = 'assets/img/';
      $targetFile = basename($_FILES['profile_image_upload']['name']);
      $result = true;
      $fileExtension = substr($targetFile, strripos($targetFile, '.'));
      $newFileName = $_SESSION['user_data']['id'].$fileExtension;
      $imageFileType = strtolower(pathinfo($newFileName, PATHINFO_EXTENSION));

      // Check file size
      if ($_FILES["profile_image_upload"]["size"] > 100000) {
          Messages::setMsg('Sorry, your file is too large.', 'info');
          $result = false;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          Messages::setMsg('Sorry, only JPG, JPEG, PNG & GIF files are allowed.', 'info');
          $result = false;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($result == false) {
          Messages::setMsg('Your file was not uploaded.', 'error');
      // if everything is ok, try to upload file
      } else {
            if (move_uploaded_file($_FILES["profile_image_upload"]["tmp_name"], $targetDir.$newFileName)) {
              $this->saveImageDatabase($newFileName);
                Messages::setMsg('The file has been uploaded.', 'success');
            } else {
                Messages::setMsg('Sorry, there was an error uploading your file.', 'error');
            }
      }
  }

//Insert file name to the database
  private function saveImageDatabase($newFileName) {
    $this->query('INSERT INTO users_photos (user_id, profile_photo) VALUES (:user_id, :profile_photo)');
    $this->bind(':user_id', $_SESSION['user_data']['id']);
    $this->bind(':profile_photo', $newFileName);
    $this->execute();
  }

//Changing the password after confirming the old password
  private function profilePassword($post) {
    $this->query('SELECT password FROM users WHERE id = :id');
    $this->bind(':id', $_SESSION['user_data']['id']);
    $this->execute();
    $row = $this->single();

    $newPassword = password_hash($post['new_password'], PASSWORD_DEFAULT);

    if (password_verify($post['current_password'], $row['password'])) {
      if (password_verify($post['repeat_password'], $newPassword)) {
          $this->query('UPDATE users SET password = :password WHERE id = :id');
          $this->bind(':password', $newPassword);
          $this->bind(':id', $_SESSION['user_data']['id']);
          $this->execute();
          Messages::setMsg('Password changed corretly', 'success');
      } else {
        Messages::setMsg('Passwords did not match.', 'error');
      }
    } else {
      Messages::setMsg('Your current password was incorrect', 'error');
    }
  }
// ////////////////////////////////////////////////////////////////////
// Profile page
// /////////////////////////////////////////////////////////////////////

  // profile
  public function profile() {
    return;
  }
}

?>

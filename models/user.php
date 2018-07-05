<?php
class UserModel extends Model {
  public function register() {
    //Sanitize POST
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $password = password_hash($post['password'], PASSWORD_DEFAULT);
    $password_repeat = password_hash($post['password_repeat'], PASSWORD_DEFAULT);

    if($post['submit']) {
      if($post['first_name'] == '' || $post['last_name'] == '' || $post['email'] == '' || $post['password'] == '' || $post['password_repeat'] == '') {
        Messages::setMsg('Please Fill In All Fields', 'error');
        return;
      }

      if(password_verify($password, $password_repeat)) {
        Messages::setMsg('Those passwords didnt match. Try again.', 'error');
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
  }

  public function login() {
    //Sanitize POST
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $password = password_hash($post['password'], PASSWORD_DEFAULT);

    if($post['submit']) {
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
      }
      return;
    }
  }
  // profile
  public function profile() {
    return;
  }

  public function profileSettings() {
    return;
  }
}
?>

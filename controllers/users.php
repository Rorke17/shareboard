<?php
class Users extends Controller {

  protected function registration() {
    $viewModel = new UserModel();
    $this->returnView($viewModel->registration(), true);
  }

  protected function logout() {
    unset($_SESSION['is_logged_in']);
    unset($_SESSION['user_data']);
    session_destroy();
    //Redirect
    header('Location: '.ROOT_URL);
  }

  // profile
  protected function profile() {
    $viewModel = new UserModel();
    $this->returnView($viewModel->profile(), true);
  }

  protected function profileSettings() {
    $viewModel = new UserModel();
    $this->returnView($viewModel->profileSettings(), true);
  }

  protected function profilePersonalData() {
    header('Location: '.ROOT_URL.'users/profileSettings');
  }

  protected function profileImage() {
    header('Location: '.ROOT_URL.'users/profileSettings');
  }

}
?>

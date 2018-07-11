<?php
class Messages {
  public static function setMsg($text, $type) {
    if($type == 'error') {
      $_SESSION['errorMsg'] = $text;
    } else if($type == 'success') {
      $_SESSION['successMsg'] = $text;
    } else {
      $_SESSION['infoMsg'] = $text;
    }
  }

  public static function display() {
    if(isset($_SESSION['errorMsg'])) {
      echo '<div class="alert alert-danger">'.$_SESSION['errorMsg'].'</div>';
      unset($_SESSION['errorMsg']);
    }

    if(isset($_SESSION['successMsg'])) {
      echo '<div class="alert alert-success">'.$_SESSION['successMsg'].'</div>';
      unset($_SESSION['successMsg']);
    }

    if(isset($_SESSION['infoMsg'])) {
      echo '<div class="alert alert-info">'.$_SESSION['infoMsg'].'</div>';
      unset($_SESSION['infoMsg']);
    }
  }

}
?>

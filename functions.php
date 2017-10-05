  <?php


  function clear_input($string){
    return trim(htmlspecialchars($string));
  }

  function is_logged_in() {
    return isset($_SESSION['user_id']);
  }



   ?>

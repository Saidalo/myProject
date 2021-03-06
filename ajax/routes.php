<?php
function call($controller, $action) {
	require_once('controllers/' . $controller . '_controller.php');
	switch($controller) {
		case 'login':
			$controller = new LoginController();
		break;
    }
	
    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('login' => ['ajaxSignIn']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
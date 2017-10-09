<?php
function call($controller, $action) {
	require_once('controllers/' . $controller . '_controller.php');
	switch($controller) {
		case 'pages':
			$controller = new PagesController();
		break;
		case 'posts':
		// we need the model to query the database later in the controller
			require_once('models/post.php');
			$controller = new PostsController();
		break;
		case 'login':
			require_once('models/user.php');
			$controller = new LoginController();
		break;
		case 'main':
			require_once('models/project.php');
			$controller = new MainController();
		break;
	  
    }
	
    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show'],
                       'main' => ['show', 'error'],
					   'login' => ['show', 'index', 'ajaxSignIn']);

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
<?php
function call($controller, $action, $param = null) {
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
    $controller->{ $action }($param);
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show'],
                       'main' => ['show', 'error', 'getProjectTickets'],
					   'login' => ['show', 'index', 'ajaxSignIn']);
  $post = [];
  $get = [];
 
  if(!$controller && !$action) {
		$path = $_SERVER['REQUEST_URI'];
		
		if(strpos($path, 'ajaxProjects')) {
			
			$controller = 'main';
			$path = $_SERVER['REQUEST_URI'];
			$action = 'getProjectTickets';
			array_push($post, $_POST['projectId']);
			
		}
  }
  
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
		
	if(!empty($post) || !empty($get)) {
			call($controller, $action, (empty($post) ? $get : $post));
		} else {
			call($controller, $action);
		}
		
    } else {
		call('pages', 'error');
    }
  } else {
		call('pages', 'error');
  }
?>
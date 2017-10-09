<?php
  require_once('connection.php');
  $ajax = false;
  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
	if( strpos( $_GET['action'], 'ajax' ) !== false ) {
		$ajax = true;
	}
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  if($ajax) {
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require_once('routes.php');
	
  } else {
	require_once('views/layout.php');
  }

?>
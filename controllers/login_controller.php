<?php
  class LoginController {
    public function login() {
      // we store all the posts in a variable
      $posts = Post::all();
      require_once('views/login/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      //if (!isset($_GET['id']))
        //return call('pages', 'error');

      // we use the given id to get the right post
      //$post = Post::find($_GET['id']);
      require_once('views/login/show.php');
    }
	
	public function ajaxSignIn() {
      $username = $_GET['username'];
	  $password = $_GET['password'];
	  $user = User::login($username, $password);
	  if($user->id) {
		  echo json_encode(['status' => 'success']);
	  } else {
		  echo json_encode(['status' => 'fail']);
	  }
    }
  }
?>
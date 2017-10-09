<?php
  class LoginController {
	public function ajaxSignIn() {
      $username = $_GET['username'];
	  $password = $_GET['password'];
	  return "success";
    }
  }
?>
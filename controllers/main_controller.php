<?php
  class MainController {
    public function show() {
      $projects = Project::all();
      require_once('views/main/index.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
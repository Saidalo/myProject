<?php
  class Project {
    public $id;
    public $name;
    public $description;

    public function __construct($id, $name, $description) {
      $this->id      = $id;
      $this->description  = $description;
      $this->name = $name;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM project');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Project($post['id'], $post['name'], $post['description']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM project WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Project($post['id'], $post['name'], $post['description']);
    }
  }
?>
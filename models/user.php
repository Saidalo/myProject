<?php
  class User {
    public $id;
    public $username;
    public $name;
    public $password;

    public function __construct($id, $username, $name, $password) {
      $this->id      = $id;
      $this->username  = $username;
      $this->name = $name;
      $this->password = $password;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM user');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new User($post['id'], $post['username'], $post['name'], $post['password']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM user WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new User($post['id'], $post['username'], $post['name'], $post['password']);
    }
	
	public static function login($username, $password) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $req = $db->prepare('SELECT * FROM user WHERE Username = :username AND Password = :password');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('username' => $username, 'password' => $password));
      $post = $req->fetch();

      return new User($post['id'], $post['username'], $post['name'], $post['password']);
    }
  }
?>
<?php
class Project 
{
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
	  
      foreach($req->fetchAll() as $post) {
        $list[] = new Project($post['id'], $post['name'], $post['description']);
      }
      return $list;
    }

    public static function getTickets($ids) {
		$db = Db::getInstance();
		$a = "SELECT 
				ticket.id as ticket_id, 
				ticket.description as t_description, 
				ticket.project as t_project, 
				ticket.status, 
				ticket.priority,  
				ticket.assignee, 
				ticket.created_date, 
				ticket.updated_date, 
				ticket.name as ticket_name, 
				project.description as project_desc,
				user.Username,
				user.Name as user_name 
			FROM ticket 
				LEFT JOIN project on project.id=ticket.project 
				LEFT JOIN user on user.id=ticket.assignee 
			where ticket.project IN ('".join("','",$ids)."')";
		$req = $db->prepare($a);
		$req->execute();
		$respond = [];
		while($post = $req->fetch()) {
			array_push($respond, $post);
		}
		return $respond;
	}
}
?>
<?php
  class Ticket {
    public $id;
    public $name;
    public $description;
    public $project;
    public $status;
    public $priority;
    public $assignee;
    public $created_date;
    public $updated_date;
	

    public function __construct($name, $description, $project, $status, $priority, $assignee, $created_date, $updated_date) {
      $this->id = $id;
      $this->name = $name;
      $this->description  = $description;
      $this->project = $project;
      $this->status = $status;
      $this->priority = $priority;
      $this->assignee = $assignee;
      $this->created_date = $created_date;
      $this->updated_date = $updated_date;
    }
  }
?>
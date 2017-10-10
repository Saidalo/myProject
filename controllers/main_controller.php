<?php
  class MainController {
    public function show() {
      $projects = Project::all();
      require_once('views/main/index.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
	
	public function getProjectTickets($params) {
		$projects = Project::getTickets($params);
		$respond = "<table class='table'>";
		foreach($projects as $project) {
			
			$priority = "";
			if($project['priority'] == 'critical') {
				$priority = 'danger';
			} else if($project['priority'] == 'bug') {
				$priority = 'warning';
			} else if($project['priority'] == 'feature') {
				$priority = 'info';
			} else if($project['priority'] == 'minor') {
				$priority = 'success';
			} 
			
			$respond .= "<tr class='".$priority."'><td>".$project['ticket_name']."</td>";
			$respond .= "<td>
							<select>
								<option value='open' ".($project['status'] == 'open'? "selected" : "")." >Open</option>
								<option value='closed' ".($project['status'] == 'closed'? "selected" : "").">Closed</option>
							</select>
						</td>";	
			$respond .= "<td>
			<select>
				<option value='critical' ".($project['priority'] == 'critical'? "selected" : "")." >Critical</option>
				<option value='bug' ".($project['priority'] == 'bug'? "selected" : "")." >Bug</option>
				<option value='feature' ".($project['priority'] == 'feature'? "selected" : "")." >Feature</option>
				<option value='minor' ".($project['priority'] == 'minor'? "selected" : "")." >Minor</option>
			</select></td>";
			$respond .= "<td>".$project['user_name']."</td>";
			$respond .= "<td>".$project['created_date']."</td>";
			$respond .= "<td>".$project['updated_date']."</td>";
			$respond .= "<td style='text-overflow: ellipsis;'>".$project['t_description']."</td></tr>";
		}
		echo $respond."</table>";
    }
  }
?>
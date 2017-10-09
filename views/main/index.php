<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/main/style.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<div class="form-group">
	<h1>To-Do <small>List</small></h1>
	<form role="form">
		<input type="text" class="form-control" placeholder="Your Task" name="task">
	</form>
    <button type="button" class="btn btn btn-primary">Add</button>
</div>
<div></div>
<ul class="list-unstyled" id="todo"></ul>
<select class="selectpicker">
<?php
foreach($projects as $project) {
?>
  <option><?=$project->name?></option>
<?php
}
?>
</select>
<ul class="list-group">
    <li class="list-group-item">
		<div class="row">
			<div class="col-sm-4">.col-sm-4</div>
			<div class="col-sm-8">.col-sm-4</div>
		</div>
	</li>
</ul>
<style>
$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
</style>
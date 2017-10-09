<DOCTYPE html>
<html>
  <head>
	<script
			  src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	
  </head>
  <body>
    <header>
      <h1>MyProject</h1>
    </header>

    <?php require_once('routes.php'); ?>

    <footer>
      
    </footer>
  </body>
<html>
<script>	
var here = null;
	$( document ).ready(function() {
		if($.cookie('login')) {
			<?php
			
			if(isset($_GET['controller']) && isset($_GET['action'])) {
			?>
			var here = true;
			<?php
			}
			?>
			if(!here) {
				window.location.replace("?controller=main&action=show");
			}
		}else{
			<?php
			
			if(isset($_GET['controller']) && isset($_GET['action'])) {
			?>
			var here = true;
			<?php
			}
			?>
			if(!here) {
				window.location.replace("?controller=login&action=show");
			}
		}
	});
</script>
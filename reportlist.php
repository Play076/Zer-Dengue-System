<?php
require 'dashboardhead.php';
?>
<body>
	<div class="jumbotron">
	  <h1 class="display-4">Lista de denúnia.</h1>
	  <table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Endereço</th>
		      <th scope="col">Image</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	while($getrepots = array_shift($requestlistereport))
		  	{
		  	?>
		    <tr>
		      <td><?php echo $getrepots->getReportaddress(); ?></td>
		      <td><img width="100" src="reports/<?php echo $getrepots->getReportphoto(); ?>.png"></td>
		    </tr>
		    <?php
			}
		    ?>
		  </tbody>
		</table>
	</div>
</body>
</html>
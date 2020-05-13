<?php
require 'dashboardhead.php';
?>
<body>
	<div class="jumbotron">
	  <h1 class="display-4">Olá <?php echo $_SESSION['username']; ?>.</h1>
	  <h4>Bem-vindo a o dashboard do portal zer@dengue.</h4>
	  <hr class="my-4">
	  <p>Aqui você podera ver a suas lista de denúncia e cadastrar novas denúncias para ajuda a combate a o aedes-aegypti.</p>
	  <a class="btn btn-primary btn-lg" href="newreport.php" role="button">Cadastrar nova denúncia</a>
	  <a class="btn btn-primary btn-lg" href="reportlist.php" role="button">Ver denúncia</a>
	</div>
</body>
</html>
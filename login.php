<?php
require 'head.php';
?>
<body>
	<div class="formslogin">
		<form action="systems/proccess/login-proccess.php" method="post">
			<div class="form-group">
			    <label for="exampleInputEmail1">Seu CPF</label>
			    <input name="usercpf" type="text" OnKeyPress="format('###.###.###-##', this)" class="form-control" maxlength="14" id="exampleInputEmail1" placeholder="Digite seu CPF">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Sua Senha</label>
			    <input name="userpswd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<br>
			<br>
			<?php
			if(isset($_GET['status']) && !empty($_GET['status']))
			{
				if($_GET['status'] == "error")
				{
			?>
				<div class="alert alert-danger" role="alert">
				 	Houve algum erro, os dados digitados não estão cadastrado, por favor tente outros dados.
				</div>
			<?php
				}
				if($_GET['status'] == "warning")
				{
			?>	
				<div class="alert alert-warning" role="alert">
				  Por favor preencha todos os campos de dados.
				</div>
			<?php
				}
			}
			?>
		</form>
	</div>
	<script type="text/javascript">
		function format(mask, userdata)
		{
			var i = userdata.value.length;
			var size = mask.substring(0, 1);
			var text = mask.substring(i);

			if(text.substring(0, 1) != size)
			{
				userdata.value+=text.substring(0, 1);
			}
		}
	</script>
</body>
</html>
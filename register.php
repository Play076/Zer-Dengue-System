<?php
require 'head.php';
?>
<body>
	<div class="formregister">
		<form action="systems/proccess/register-proccess.php" method="post">
			<div class="form-group">
			    <label for="inputAddress">Nome Completo</label>
			    <input name="username" type="text" class="form-control" id="inputAddress" placeholder="Digite seu nome completo">
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="inputEmail4">Seu e-mail</label>
			      	<input name="useremail" type="email" class="form-control" id="inputEmail4"
			      	placeholder="Digite seu e-amil">
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputPassword4">Senha</label>
			      	<input name="userpswd" type="password" class="form-control" id="inputPassword4" placeholder="Digite uma senha segura">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="inputEmail4">Seu RG</label>
			      	<input name="userrg" type="text" OnKeyPress="formatcorret('##.###.###-##', this)" maxlength="13" class="form-control" id="inputEmail4"
			      	placeholder="Digite seu RG">
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputPassword4">Seu CPF</label>
			      	<input name="usercpf" type="text" class="form-control" id="inputPassword4" OnKeyPress="formatcorret('###.###.###-##', this);" maxlength="14" placeholder="Digite seu CPF">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputAddress2">Seu Endereço</label>
			    <input name="useraddress" type="text" class="form-control" id="inputAddress2" placeholder="Digite seu Endereço">
			</div>
			<div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="inputCity">Celular</label>
			      <input name="userphone" type="text" class="form-control" id="inputAddress2" OnKeyPress="formatcorret('#######-####', this);" maxlength="12" placeholder="Digite seu o número do seu celular para contato">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputState">Estado</label>
			      <select name="userstate" id="inputState" class="form-control">
			        <option selected>Selecione seu estado...</option>
			        <option value="Acre">Acre</option>
			        <option value="Alagoas">Alagoas</option>
			        <option value="Amapá">Amapá</option>
			        <option value="Amazonas">Amazonas</option>
			        <option value="Bahia">Bahia</option>
			        <option value="Ceará">Ceará</option>
			        <option value="Distrito Federal">Distrito Federal</option>
			        <option value="Espiríto Santo">Espiríto Santo</option>
			        <option value="Goiás">Goiás</option>
			        <option value="Maranhão">Maranhão</option>
			        <option value="Mato Grosso">Mato Grosso</option>
			        <option value="Mato Grosso do sul">Mato Grosso do Sul</option>
			        <option value="Minas Gerais">Minas Gerais</option>
			        <option value="Pará">Pará</option>
			        <option value="Paraíba">Paraíba</option>
			        <option value="Paraná">Paraná</option>
			        <option value="Pernambuco">Pernambuco</option>
			        <option value="Piauí">Piauí</option>
			        <option value="Rio de janeiro">Rio de janeiro</option>
			        <option value="Rio grande do sul">Rio grande do sul</option>
			        <option value="Rio grande do norte">Rio grande do norte</option>
			        <option value="Rondônia">Rondônia</option>
			        <option value="Roraima">Roraima</option>
			        <option value="Santa catarina">Santa catarina</option>
			        <option value="São paulo">São paulo</option>
			        <option value="Sergipe">Sergipe</option>
			        <option value="Tocantins">Tocantins</option>
			      </select>
			    </div>
			    <div class="form-group col-md-4">
			      	<label for="inputZip">Bairro</label>
			      	<input name="userstreet" type="text" class="form-control" id="inputAddress2" placeholder="Digite o nome do seu bairro">
			    </div>
			</div><br>
			<button type="submit" class="btn btn-primary">Cadastra</button>
			<br>
			<br>
			<?php
			if(isset($_GET['status']) && !empty($_GET['status']))
			{
				if($_GET['status'] == "error")
				{
			?>
			<div class="alert alert-danger" role="alert">
			  	Os dados digitados já estão cadastrados, por favor tente outros dados.
			</div>
			<?php
				}
				if($_GET['status'] == "warning")
				{
			?>
			<div class="alert alert-warning" role="alert">
			  	por favor preencha todos os campos de dados.
			</div>
			<?php
				}
			}
			?>
			<br>
		</form>
	</div>
	<script type="text/javascript">
		function formatcorret(mask, userdate) 
		{
			var i = userdate.value.length;
			var total = mask.substring(0, 1);
			var size = mask.substring(i);

			if(size.substring(0, 1) != total)
			{
				userdate.value += size.substring(0, 1);
			}
		}
	</script>
</body>
</html>
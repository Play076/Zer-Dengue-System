<?php
require 'dashboardhead.php';
?>
<body>
	<div class="formslogin">
		<form enctype="multipart/form-data" action="systems/proccess/report-proccess.php" method="post">
			<div class="form-group">
				<input name="userid" type="hidden" class="form-control" id="formGroupExampleInput" value="<?php echo $_SESSION['userid']; ?>">
			    <label for="formGroupExampleInput">Endereço</label>
			    <input name="address" type="text" class="form-control" id="formGroupExampleInput" placeholder="Digite o endereço da ocorrência">
			</div>
			<div class="form-group">
			    <label for="exampleFormControlTextarea1">Descrição com o relato do local</label>
			    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>
			<div class="form-group">
			    <label for="exampleFormControlFile1">Selecione a image da denúncia</label>
			    <input name="imgreport" type="file" class="form-control-file" id="exampleFormControlFile1">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
			<br>
			<br>
			<?php
			if(isset($_GET['status']))
			{
				if($_GET['status'] == "imgwarning")
				{
			?>
				<div class="alert alert-warning" role="alert">
				  Por favor selecione uma image.
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
</body>
</html>
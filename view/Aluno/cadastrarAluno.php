<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <style>
  div.formulario { width: 30%; height: 80%; margin: auto; line-height: 2.2; font-size: 15px;}
  h2{text-align: center}
  </style>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TCC</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="../Login/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cadastrarAluno.php">Aluno</a></li>
          <li><a href="../Professor/cadastrarProfessor.php">Professor</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
	<div class="formulario">
	<h2>Cadastrar Aluno</h2>
	<form method="POST" action="../../model/alunoDAO.php">
	<div class="editor-label"><label>Nome:</label></div>
	<div class="editor-field"><input class="form-control" type="text" name="nome"></div>
	<div class="editor-label"><label>Matricula:</label></div>
	<div class="editor-field"><input class="form-control" type="text" name="matricula"></div>
	<div class="editor-label"><label>Instituição:</label></div>
	<div class="editor-field">
		<select class="form-control" name="instituicao">
		<option>Selecione</option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM instituicao";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['idInstituicao']; ?>"> <?php echo $row_result['instituicao']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
		</select>
		<div>
	</div>
	<div class="editor-label"><label>Curso:</label></div>
	<div class="editor-field">
		<select class="form-control" name="curso">
		<option>Selecione</option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM curso";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['codCurso']; ?>"> <?php echo $row_result['curso']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
		</select>
	</div>
	<div class="editor-label"><label>Senha:</label></div>
	<div class="editor-field"><input class="form-control" type="password" name="senha"></div>
	
	<br>
	<div class="editor-field">
		<center>
		 <button id="save" name="save" type="submit" class="btn btn-success">Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
		 </center>
	</div>
	</form>

</div>
</body>
</html>
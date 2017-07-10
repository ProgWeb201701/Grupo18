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
      <a class="navbar-brand" href="#">Coordenador</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">TCC <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cadastrarTCC.php">Cadastrar Tcc</a></li>
          <li><a href="./viewTCC.php">Visualizar Tcc</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<div class="conteiner">
	<center><h2>Cadastrar TCC</h2><br/>
	<form method="POST" action="../../model/tccDAO.php">
	<div class="editor-label"><label>Titulo</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="titulo"></label></div>
	<div class="editor-label"><label>Tema</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="tema"></label></div>
	<div class="editor-label"><label>Orientando</label></div>
	<div class="editor-label">
		<label>
		<select class="form-control" name="aluno">
		<option>Selecione</option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM orientando";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['matricula']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
			}
		?>
		</label>
		</select>
	</div>
	<div class="editor-label"><label>Orientador</label></div>
	<div class="editor-field">
		<label>
		<select class="form-control" name="idOrientador">
		<option>Selecione</option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['siap']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
			}
		?>
		</label>
		</select>
	</div>
	<div class="editor-label"><label>Avaliador 1</label></div>
	<div class="editor-field">
		<label>
		<select class="form-control" name="idAvaliador">
		<option>Selecione</option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['siap']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
		</label>
		</select>
	</div>

	<div class="editor-label"><label>Avaliador 2</label></div>
	<div class="editor-field">
		<label>
		<select class="form-control" name="idAvaliador2">
		<option>Selecione</option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['siap']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
		</label>
		</select>
	</div>
	
    <br>
    <div class="editor-field">
         <button id="save" name="save" type="submit" class="btn btn-success">Salvar
         <i class='glyphicon glyphicon-floppy-disk'></i>
         </button>
    </div>
    </form>
    </center>
</div>
</body>
</html>

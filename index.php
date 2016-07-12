<?php
//require_once "conexao.php"
include "config.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Nome do Site</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Meu Site</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Início <span class="sr-only">(current)</span></a></li>
          <li><a href="index.php?" >Entre</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informações <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

  </head>
 
  <body>
  <br>
  <h1 align="center">Site em manutenção...</h1>

  <?php 
    if(isset($_POST['cadastrar'])){
    #CREATE
      
      $nome = $_POST['nome'];
      $email = $_POST['email'];

      $sql = 'INSERT INTO usuarios (nome, email) ';
      $sql .= 'VALUES (:nome, :email)';

      	try {

	        $create = $db->prepare($sql);
	        $create->bindValue(':nome', $nome, PDO::PARAM_STR);
	        $create->bindValue(':email', $email, PDO::PARAM_STR);

	        if($create->execute()){
	          echo "<div align='center' class='aler alert-success'>
	          <button type='button' class='close' data-dismiss='alert'></button>
	          <strong>Inserido com sucesso!</strong>
	          </div>";
	        }     
      	}catch (PDOException $e) {
          echo "<div align='center' class='alert alert-warning'>
            <button type='button' class='close' data-dismiss='alert'></button>
            <strong>Falha ao inserir dados.</strong>" . $e->getMessage() . " 
            </div>";
      }
    }

    #UPDATE
    if (isset($_POST['atualizar'])) {
    	$id = (int)$_GET['id'];
    	$nome = $_POST['nome'];
    	$email = $_POST['email'];

    	$sqlUpdate = 'UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id';

    	try {
    		$update = $db->prepare($sqlUpdate);
    		$update->bindValue(':id', $id, PDO::PARAM_INT);
    		$update->bindValue(':nome', $nome, PDO::PARAM_STR);
    		$update->bindValue(':email', $email, PDO::PARAM_STR);

    		$update->execute();

    		echo "<div align='center' class='alert alert-success'>
	          <button type='button' class='close' data-dismiss='alert'></button>
	          <strong>Atualizado com sucesso!</strong>
	          </div>";
    		
    	} catch (PDOException $e) {
    		 echo  $e->getMessage();
    	}
    }

    # DELETE
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    	$id = (int)$_GET['id'];
 			
 			$sqlDelete = 'DELETE FROM usuarios WHERE id = :id';

 			try{
	    	$delete = $db->prepare($sqlDelete);
	    	$delete->bindValue(':id', $id, PDO::PARAM_INT);
	    	
    		if($delete->execute()){
    			echo "<div align='center' class='alert alert-success'>
	          <button type='button' class='close' data-dismiss='alert'></button>
	          <strong>Deletado com sucesso!</strong>
	          </div>";
;
    		}
			}catch(PDOException $e){
				echo "<div align='center' class='alert alert-warning'>
	          <button type='button' class='close' data-dismiss='alert'></button>
	          <strong>Erro!</strong>" . $e->getMessage() . "  
	          </div>";
			}    
    }

  ?>

 
    <!-- <h1>Hello, world!</h1> -->

<?php
if(isset($_GET['action']) && $_GET['action'] == 'update'){

	$id = (int)$_GET['id'];

	$sqlSelect = 'SELECT * FROM usuarios WHERE id = :id';

	try {
		$select = $db->prepare($sqlSelect);
		$select->bindValue(':id', $id,PDO::PARAM_INT);
		$select->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	$result = $select->fetch(PDO::FETCH_OBJ);

?>
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Página Inicial<span class="divider"> </span></a></li>
			<li class="active">Atualizar</li>
		</ul>
	</div>

	<form align="center" class="form-inline" method="post" action="">
	    <div class="form-group">
	      <label class="sr-only" for="nome">nome</label>
	      <input type="text" class="form-control" name="nome" id="nome" value="<?=$result->nome;?>" placeholder="Digite seu Nome">
	    </div>
	    <div class="form-group">
	      <label class="sr-only" for="email">email</label>
	      <input type="email" class="form-control" name="email" id="email" value="<?=$result->email;?>" placeholder="Digite seu Email">
	    </div
	      <input type="submit" name="atualizar" class="btn btn-default" value="Atualizar Dados">
	      <button type="submit" name="atualizar" class="btn btn-default" value="Atualizar Dados">Atualizar</button>
    </form>	

<?php
}else{
?>
	<form align="center" class="form-inline" method="post" action="">
	    <div class="form-group">
	      <label class="sr-only" for="nome">nome</label>
	      <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu Nome">
	    </div>
	    <div class="form-group">
	      <label class="sr-only" for="email">email</label>
	      <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu Email">
	    </div
	      <input type="submit" name="cadastrar" class="btn btn-default" value="Atualizar Dados">
	      <button type="submit" name="cadastrar" class="btn btn-default" value="Cadastrar Dados">Cadastrar</button>
    </form>	
<?php
}
?>

<div class="container">
<table class="table table-hover">
	<thead>
		<td>#</td>
		<td>Nome</td>
		<td>Email</td>
		<td>Ações</td>
	</thead>
    <tbody>
    <?php
    $sqlRead = 'SELECT * FROM usuarios';
    try{
    	$read = $db->prepare($sqlRead);
    	$read->execute();

    }catch(PDOEXCEPTION $e){
    	echo $e->getMessage();
    }
    while($rs = $read->fetch(PDO::FETCH_OBJ)){
    ?>
    	<tr>
    		<td><?=$rs->id?></td>
    		<td><?=$rs->nome?></td>
    		<td><?=$rs->email?></td>
    		<td>
    			<a href="index.php?action=update&id=<?=$rs->id;?>" class="btn">Editar</a>
    			<a href="index.php?action=delete&id=<?=$rs->id;?>" class="btn" onclick="return confirm('Deseja deletar?');">Excluir</a>
    		</td>
    	</tr>

    <?php	} ?>

    </tbody>
</table>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
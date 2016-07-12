<?php
	//session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar Login.">
    <meta name="author" content="Mike Santolin">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Área para usários cadastrados</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <div class="container">

      <form align="center" class="form-inline" action="valida-login.php">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Email/Login</label>
          <input type="email" class="form-control" name="emailUsuario" id="emailUsuario" placeholder="Digite seu Email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword3">Senha</label>
          <input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" placeholder="Digite sua Senha">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Lembrar
          </label>
        </div>
          <button type="submit" name="entrar" class="btn btn-default" >Entrar</button>
          <button type="submit" name="cadastrar" class="btn btn-default" >Cadastrar</button>
      </form>
        
    </div> 
	
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	
  </body>
</html>


---

<div class="container">

      <form align="center" class="form-inline" method="post" action="">
        <div class="form-group">
          <label class="sr-only" for="nome">nome</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu Nome">
        </div>
        <div class="form-group">
          <label class="sr-only" for="email">email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu Email">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Lembrar
          </label>
        </div>
          <button type="submit" name="entrar" class="btn btn-default" >Entrar</button>
          <button type="submit" name="cadastrar" method="post" class="btn btn-default" >Cadastrar</button>
      </form>
        
    </div> 
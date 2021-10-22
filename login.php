<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "imports.html" ?>
</head>
<body>
    <?php
        include 'conn.php';

        if (isset($_POST['usuario'])){
            if ($_POST['usuario'] != ''){

                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['senha'] = $_POST['senha'];

                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];

                $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

                if ($result = mysqli_query($conn,$sql)){
                    $data = mysqli_fetch_array($result);
                    if ($data['usuario'] == $usuario){
                        if ($data['senha'] == $senha ){
                            $_SESSION['usuario'] = $data['usuario'];
                            $_SESSION['senha'] = $data['senha'];
                            header("Location: ./index.php");
                        }
                    }
                }
            }
        }
    ?>
    <header class="container">
        <?php include_once "header.php" ?>
    </header>
    <main class="container mt-5 pt-3">
		<div class="col-md-6 mx-auto">
			<div class="card w-95">
				<h5 class="card-header bg-transparent text-center">Faça seu login</h5>			
				<div class="card-body text-center">
					<div class="col-md-12 align-self-center">
						<form action="login.php" method="POST">
		                    <div class="form-floating mb-3">
		                        <input type="text" class="form-control" id="usuario" name="usuario"
		                            placeholder="Usuário" autofocus>
		                        <label for="usuario" class="form-label">Usuário</label>
		                    </div>
		                    <div class="form-floating mb-3">
		                        <input type="password" class="form-control" id="senha" name="senha"
		                            placeholder="Senha">
		                        <label for="senha" class="form-label">Senha</label>
		                    </div>
		                    <button class="btn btn-dark">Login</button>
		                </form>
		            </div>	
				</div>
			</div>
		</div>
    </main>
</body>
</html>
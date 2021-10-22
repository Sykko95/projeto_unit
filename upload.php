<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Documentos</title>
    <?php include "imports.html" ?>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header class="container mb-2">
            <?php include_once "header.php" ?>
    </header>
    <main class="container mt-5 pt-3">
        <div class="my-2">
			<h1 class="mb-4">Cadastro de Documento</h1>
		</div>
		<form action="save.php" method="POST" enctype="multipart/form-data">
			<div class="row mb-3">
				<div class="col-9 col-md-4">
					<input class="form-control" type="file" name="imagem" accept="image/gif, image/jpeg, image/png, application/pdf">
				</div>
			</div>
			<div class="row mb-3">
                <h4>Descrição:</h4>
                <div class="col-md-5 col-9">
					<div class="row">
						<div class="form-floating my-2">
							<input type="text" name="certificado" class="form-control" maxlength="50" placeholder="Nome do Certificado">
							<label for="certificado" class="form-label">Nome do Certificado</label>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-9">
					<div class="row">
						<div class="form-floating my-2">
							<input type="text" name="tipo" class="form-control" maxlength="50" placeholder="Tipo de Atividade">
							<label for="tipo" class="form-label">Tipo de Atividade</label>
						</div>
					</div>
				</div>
                <div class="col-md-2 col-4">
                    <div class="row">
                        <div class="form-floating my-2">
							<input type="text" name="horas" class="form-control" maxlength="4" placeholder="Horas" onkeypress="return isNumberKey(event)">
							<label for="horas" class="form-label">Horas</label>
						</div>
                    </div>
                </div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-2 col-md-1">
					<button type="submit" class="btn btn-dark">Enviar</button>
				</div>
				<div class="col-2 col-md-1">
					<button type="reset" class="btn btn-dark">Limpar</button>
				</div>
			</div>
		</form>
    </main>
</body>
</html>
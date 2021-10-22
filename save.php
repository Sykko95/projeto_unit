<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include "imports.html"; ?>
</head>
<body>
    <header class="container mb-2">
        <?php include_once "header.php" ?>
    </header>
    <main class="container mt-5 pt-3">
        <?php 
            include "conn.php";
            $imgtmp = $_FILES['imagem']['tmp_name'];
            $imgerror = $_FILES['imagem']['error'];
            $certificado = $_POST['certificado'];
            $tipo = $_POST['tipo'];
            $horas = $_POST['horas'];
            $status = 0;
            $usuario = $_SESSION['usuario'];

            try {
                if (
                    !isset($imgerror) ||
                    is_array($imgerror)
                ) {
                    throw new RuntimeException('Parâmetros inválidos.');
                }
               
                switch ($imgerror) {
                    case UPLOAD_ERR_OK:
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        throw new RuntimeException('Nenhum arquivo enviado.');
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new RuntimeException('Tamanho do arquivo excedido.');
                    default:
                        throw new RuntimeException('Erro desconhecido.');
                }
    
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                    $finfo->file($imgtmp),
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                        'pdf' => 'application/pdf',
                    ),
                    true
                )) {
                    throw new RuntimeException('Formato de arquivo inválido.');
                }

                $link = sprintf('img/%s.%s',sha1_file($imgtmp),$ext);
                if(!move_uploaded_file($imgtmp,$link)){
                    throw new RuntimeException('Falha ao mover o arquivo.');
                } 
                $sql = "INSERT INTO certificados(usuario, link, certificado, tipo, horas, status) VALUES('$usuario','$link','$certificado','$tipo','$horas','$status')";

                if (mysqli_query($conn,$sql)){
                    echo "<h3 class='mt-2 text-center'>Certificado salvo com sucesso\n";
                } else {
                    throw new RuntimeException('Erro na conexão com o banco');
                }                
            } catch (RuntimeException $e) {
                echo $e->getMessage();
            }
        ?>

    <div class='text-center'>
		<a href='index.php'><button class='btn btn-dark'>Voltar</button></a>
	</div>

	<?php
		$conn->close();
	?>
    </main>
</body>
</html>
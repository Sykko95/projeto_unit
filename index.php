<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <?php include "imports.html" ?>
</head>
<body>
    <?php 
        include "conn.php";

        if(!isset($_SESSION['usuario'])){
            header("Location: ./login.php");
        } else {
            $usuario = $_SESSION['usuario'];
            $sql = "SELECT * FROM certificados WHERE usuario = '$usuario' ";
            $resultado = mysqli_query($conn,$sql);

    ?>
    <header class="container mb-2">
        <?php include_once "header.php" ?>
    </header>
    <main class="container mt-5 pt-3">
        <div class="mb-3">
            <h1 align="center">Lista de Documentos</h1>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome do Certificado</th>
                    <th scope="col">Tipo de Atividade</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($data = mysqli_fetch_array($resultado)){
                        $link = $data['link'];
                        $certificado = $data['certificado'];
                        $tipo = $data['tipo'];
                        $horas = $data['horas'];
                        $status = $data['status'];

                        echo "<tr>";
                        echo "<td scope='row'><a href='$link' target='blank' class='link-light'>$certificado</a></td>";
                        echo "<td>$tipo</td>";
                        echo "<td>$horas</td>";
                        if ($status == 1) {echo "<td >Homologado</td>";} else {echo "<td >Não-Homologado</td>";};
                        echo "</tr>";
                    }
                ?>
            </tbody>
           
        </table>
    </main>
</body>
</html>
<?php }
?>
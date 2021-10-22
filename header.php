<?php $currentPage = (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)); ?>
<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top mb-4">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if ($currentPage != "login.php") { ?>
            <ul class="navbar-nav ms-3 me-auto">
                <li class="nav-item">
                    <a <?php if ($currentPage == "index.php") {echo "class='nav-link active' aria-current='page'";} else {echo "class='nav-link'";} ?>href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a <?php if ($currentPage == "upload.php") {echo "class='nav-link active' aria-current='page'";} else {echo "class='nav-link'";} ?>href="upload.php">Envio de Documentos</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php 
                    echo "<li class='nav-item'><a href='logout.php' class='mx-2 nav-link active'>
                    Logout
                    </a></li>";
                } else {
                    echo "<div class='navbar-brand mx-auto'>Login</div>";
                } ?>
            </ul>
        </div>
    </div>
</nav>
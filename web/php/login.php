<?php
set_include_path("D:\\desarrollos\\xampp\\htdocs\\ewebik\\");
include "./cuenta/usuarios.php";
$oUsuarios = new Usuarios();
if (!empty($_POST)) {
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $lPassC = sha1(md5("ewebik" . $pass));
    //echo $lPassC;
    if ($oUsuarios->login($correo, $lPassC) == 200) {
        header("Location: http://localhost/ewebik/web/");
    } else {
        header("Location: http://localhost/ewebik/web/paginas/login/?c=401");
    }
} else {
    header("Location: http://localhost/ewebik/web/paginas/login/?c=401");
}

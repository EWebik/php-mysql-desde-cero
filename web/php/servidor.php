<?php
set_include_path("D:\\desarrollos\\xampp\\htdocs\\ewebik\\");
include "./cuenta/usuarios.php";
include './mysql.php';
$oMysql = new MySQL();
$oUsuarios = new Usuarios();
$response = "";

if (!empty($_POST)) {
    $oUsuarios->sesion = $oUsuarios->getInstancia();
    $rolWeb = $oUsuarios->sesion->__get("rolWeb");
    if ($rolWeb) {
        http_response_code(200);


        $rq = $_POST['rq'];

        if ($rq == 1) {
            $response = $oMysql->getVendidos();
        } else if ($rq == 2) {
            $response = $oMysql->getAlmacen();
        } else if ($rq == 3) {
            $response = $oMysql->getIngresos();
        } else if ($rq == 4) {
            $response = $oMysql->getDatosGrafica();
        }

        echo $response;
    } else {
        header("Location: http://localhost/ewebik/web/paginas/login/");
        http_response_code(401);
    }
} else {
    header("Location: http://localhost/ewebik/web/paginas/login/");
    http_response_code(401);
}

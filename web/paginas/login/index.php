<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MySQL con PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/ewebik/web/css/style.css">
</head>

<body>

    <div class="container">
        <div class="centrar">
            <form method="POST" action="http://localhost/ewebik/web/php/login.php">
                <img src="https://ewebik.com/static/img/logoN.png" class="img-fluid" />
                <div class="form-group">
                    <label for="idCorreo">Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" id="idCorreo" aria-describedby="emailHelp" placeholder="Correo electrónico">
                    <small id="emailHelp" class="form-text text-muted">Valor no valido.</small>
                </div>
                <div class="form-group">
                    <label for="idPass">Contraseña</label>
                    <input type="password" name="pass" class="form-control" id="idPass" placeholder="Contraseña">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="idMensaje" style="display: none;" class="alert alert-danger my-3" role="alert">
                <p>El Usuario y/o contraseña no es correcto.</p>
            </div>
        </div>
    </div>

    <script src="http://localhost/ewebik/web/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        const queryString = window.location.search;
        if (queryString != "") {
            //?c=401
            const eCode = parseInt(queryString.replace("?c=", ""));
            if (eCode == 401) {
                document.getElementById("idMensaje").style.display = "block";
            }
        }
    </script>
</body>

</html>
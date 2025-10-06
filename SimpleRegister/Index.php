<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro Simple</title>
</head>

<body>
    <?php
    $error = "";
    $username = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST["username"]) || empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error = "Tenemos problemas con tus Validaciones";
        } else {
            $username = htmlspecialchars(trim($_POST['username']));
            $email = htmlspecialchars(trim($_POST['email']));
        }
    }
    ?>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($error)): ?>
    <nav>
        <ul>
            <li>
                <img src="https://img.freepik.com/vector-gratis/circulo-azul-usuario-blanco_78370-4707.jpg?semt=ais_hybrid&w=740&q=80"
                    alt="Avatar de usuario" width="80">
            </li>
            <li>
                <a href="#contact">Bienvenido <?= $username; ?></a>
            </li>
        </ul>
    </nav>

    <h2 class="nav-info">
        ¡Este es tu perfil de usuario, <?= $username; ?>!
        <?php if (!empty($email)): ?>
        y este es tu correo <?= $email; ?>!
        <?php endif; ?>
    </h2>

    <?php else: ?>
    <div class="info">
        <div>
            <h3 class="title">Inicia Sesión y/o Regístrate</h3>
            <h2 class="sub-title">Con este proceso aceptas nuestros términos y condiciones</h2>
        </div>

        <div class="content-form">
            <form id="form" action="index.php" method="post">
                <h3 class="title-form" id="formTitle">Iniciar Sesión</h3>

                <label>Nombre de usuario</label>
                <input type="text" name="username" placeholder="JuanC" value="<?= $username; ?>">

                <label>Correo electrónico</label>
                <input type="" name="email" placeholder="tu@correo.com" value="<?= $email; ?>">

                <label>Contraseña</label>
                <input type="password" name="password" placeholder="**********">

                <?php if (!empty($error)): ?>
                <p class="error"><?= $error; ?></p>
                <?php endif; ?>
                <button type="submit" id="mainButton">Acceder</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

</body>

</html>
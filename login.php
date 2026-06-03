<?php
session_start();

if(isset($_POST['entrar'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $numero_control = explode("@", $correo)[0];

    $password_correcta = $numero_control. "tso";

    if(
        strpos($correo, "@itoaxaca.edu.mx") !== false &&
        $password === $password_correcta
    ){

        $_SESSION['usuario'] = $correo;

        header("Location: admin.php");

    }else{
        $error = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Truper</title>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            background:
            linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)),
            url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1400');

            background-size:cover;
            background-position:center;
        }

        .login-box{

            width:420px;
            background:rgba(255,255,255,.1);

            border:1px solid rgba(255,255,255,.2);

            backdrop-filter:blur(15px);

            padding:40px;

            border-radius:25px;

            box-shadow:0 0 25px rgba(0,0,0,.5);

            color:white;
        }

        .login-box h1{
            text-align:center;
            margin-bottom:35px;
            font-size:40px;
            color:#f97316;
        }

        .input-box{
            margin-bottom:25px;
            position:relative;
        }

        .input-box input{

            width:100%;
            padding:16px 20px;

            border:none;
            outline:none;

            border-radius:15px;

            background:rgba(255,255,255,.15);

            color:white;

            font-size:16px;
        }

        .input-box input::placeholder{
            color:#ddd;
        }

        .input-box i{
            position:absolute;
            right:20px;
            top:18px;
            color:#f97316;
        }

        .btn{

            width:100%;

            padding:16px;

            border:none;

            border-radius:15px;

            background:#f97316;

            color:white;

            font-size:18px;

            cursor:pointer;

            transition:.3s;
        }

        .btn:hover{
            background:#ea580c;
            transform:scale(1.03);
        }

        .error{
            background:#dc2626;
            padding:15px;
            margin-bottom:20px;
            border-radius:12px;
            text-align:center;
        }

        .back{
            text-align:center;
            margin-top:20px;
        }

        .back a{
            color:#f97316;
            text-decoration:none;
        }

    </style>

</head>
<body>

<div class="login-box">

    <h1>Login - Truper</h1>

    <?php if(isset($error)){ ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="input-box">

            <input
            type="email"
            name="correo"
            placeholder="Correo institucional"
            required>

            <i class="fa-solid fa-envelope"></i>

        </div>

        <div class="input-box">

            <input
            type="password"
            name="password"
            placeholder="Contraseña"
            required>

            <i class="fa-solid fa-lock"></i>

        </div>

        <button type="submit" name="entrar" class="btn">
            INGRESAR
        </button>

    </form>

    <div class="back">
        <a href="index.php">← Volver al inicio</a>
    </div>

</div>

</body>
</html>

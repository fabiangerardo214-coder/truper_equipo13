<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUPER SYSTEM</title>

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
            background:#0f172a;
            color:white;
        }

        nav{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:20px 60px;
            background:rgba(0,0,0,.5);
            backdrop-filter:blur(10px);
            position:fixed;
            width:100%;
            z-index:1000;
        }

        nav h1{
            color:#f97316;
            font-size:35px;
        }

        nav a{
            text-decoration:none;
            color:white;
            margin-left:25px;
            transition:.3s;
            font-size:18px;
        }

        nav a:hover{
            color:#f97316;
        }

        .hero{
            height:100vh;
            background:
            linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)),
            url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1400');
            background-size:cover;
            background-position:center;

            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            text-align:center;
            padding:20px;
        }

        .hero h2{
            font-size:75px;
            margin-bottom:20px;
        }

        .hero p{
            width:70%;
            font-size:22px;
            line-height:35px;
            margin-bottom:40px;
        }

        .btn{
            padding:18px 40px;
            background:#f97316;
            color:white;
            text-decoration:none;
            border-radius:15px;
            font-size:20px;
            transition:.3s;
            box-shadow:0 0 20px rgba(249,115,22,.5);
        }

        .btn:hover{
            transform:scale(1.08);
            background:#ea580c;
        }

        .cards{
            padding:80px;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:25px;
            background:#111827;
        }

        .card{
            background:#1e293b;
            padding:40px;
            border-radius:25px;
            text-align:center;
            transition:.3s;
            box-shadow:0 0 15px rgba(0,0,0,.4);
        }

        .card:hover{
            transform:translateY(-10px);
        }

        .card i{
            font-size:60px;
            color:#f97316;
            margin-bottom:20px;
        }

        .card h3{
            margin-bottom:15px;
            font-size:25px;
        }

        .card p{
            color:#cbd5e1;
        }

        footer{
            background:#020617;
            text-align:center;
            padding:25px;
            font-size:18px;
        }

    </style>
</head>
<body>

<nav>
    <h1>TRUPER</h1>

    <div>
        <a href="">Inicio</a>
        <a href="">Productos</a>
        <a href="">Nosotros</a>
        <a href="login.php">Login</a>
    </div>
</nav>

<section class="hero">

    <h2Sistema Truper</h2>

    <p>
        cesar, y gerardo
    </p>

    <a href="login.php" class="btn">
        Iniciar Sesión
    </a>

</section>

<section class="cards">

    <div class="card">
        <i class="fa-solid fa-screwdriver-wrench"></i>
        <h3>Herramientas</h3>
        <p>Administración profesional de productos TRUPER.</p>
    </div>

    <div class="card">
        <i class="fa-solid fa-database"></i>
        <h3>MySQL</h3>
        <p>Conectado completamente a Ubuntu Server.</p>
    </div>

    <div class="card">
        <i class="fa-solid fa-shield-halved"></i>
        <h3>Seguridad</h3>
        <p>Validación con correo institucional del TEC.</p>
    </div>

</section>

<footer>
    © 2026 TRUPER SYSTEM | PHP + MySQL + Ubuntu Server
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Cours</title>
    <style>
        body 
        {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            height: 100vh;
            width: 100%;
            background-image: url("public/piecesJoints/images/1691682.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
            background-blend-mode:hue;
        }

        section 
        {
            width: 100%;
        }

        button 
        {
            cursor: pointer;
            width: 30.1vh;
            height: 8.1vh;
            font-size: 2.1em;
            background-color: transparent;
            border: none;
            border-left: 5px solid white;
            font-family: 'Segoe UI';
            color: white;
        }
    </style>
</head>

<body>
    <section>
        <center>
            <button onclick="start()">Commencer</button>
        </center>
    </section>
</body>
<script>
    let button = document.querySelector('button');
    let body = document.querySelector('body')

    function start() {
        location.href = "public/index.php";
    }
</script>

</html>

<?php
//header('location:public/index.php');
?>
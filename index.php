<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="SCSS/style.css">
    <title>Horoskop - Lab 3</title>
</head>
<body>
    <article>
        <h1>Se ditt Horoskop</h1>
        <h3>Ange datum</h3>
        <input type="date" value="<?php echo date('Y-m-d'); ?>" id="date" ><br>
        <button onclick="save()">Spara</button>
        <button onclick="update()">Uppdatera</button>
        <button onclick="kill()">Ta bort</button>
        <ul id="save">
        </ul>
        <script src="js.js"></script>
    </article>
</body>
</html>
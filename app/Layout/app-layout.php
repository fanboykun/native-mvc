<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Layout</title>
</head>
<body>
    <h1>Main Layout, From Layout</h1>
    <?php 
         if(isset($content)) {
            require $content; 
        }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="./assets/stylesheet/task.css">
</head>
<body>
    
    <div id="app">
        <?php include_once $view . "layout/header.php"; ?>
        <?php include_once $goto ?> 
        <?php include_once $view . "layout/footer.php"; ?>
    </div>
    
    
    <script src="index.js"></script>
</body>
</html>
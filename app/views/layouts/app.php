<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers Marquet</title>
   <link href="css/styles.css" rel="stylesheet">
   <link href="css/variables.css" rel="stylesheet">
</head>

<body>
    <?php require_once VIEWS."/layouts/partials/site/nav.php"?>
    <?php require_once VIEWS."/layouts/partials/site/aside.php"?>
    <div class="container">
    {{content}}
    </div>
    <?php require_once VIEWS."/layouts/partials/site/footer.php"?>
        <script defer src="js/product.js"> </script>
        <script defer src="js/app.js"></script>
</body>
</html>
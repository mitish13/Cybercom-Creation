<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CYBERCOM CREATION</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Skin/custom.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">MVC APP</a>
       
        <div>
            <ul class="navbar-nav">
                <?php echo  $this->getChild("Header")->toHtml(); ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php echo $this->createBlock('Block_Core_Layout_Message')->toHtml(); ?>
        <?php echo  $this->getChild("Content")->toHtml(); ?>

    </div>

    <?php echo  $this->getChild("Footer")->toHtml(); ?>
    
</body>

</html>
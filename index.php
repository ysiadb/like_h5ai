<!DOCTYPE html>
<html>

<head>
    <!-- BASICS 
    ______________________________-->

    <meta charset="UTF-8">
    <title>My_H5ai</title>

    <!-- CSS 
    ______________________________-->

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet"> 

    <!-- MOBILE SPECIFIC METAS 
    ______________________________-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT 
    ______________________________-->

    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- FAVICON 
    ______________________________-->

    <link rel="icon" type="image/png" href="images/favicon.png">

</head>

<body>

<header>
    <section class="container-fluid">
        <div class="row">
            <div class="header">
                <h1>My_H5ai</h1>
            </div>    
        </div>
        <div class="row path">
                <?php 
                $path_directory = "/home/wac/daisyB-repo/";
                $display_path = str_replace('/',' > ', $path_directory);          
                echo $display_path ;
                ?>
        </div>
    </section>
</header>
<div class="row">
    <section class="container-fluid main">
        <section class="col-3 menunav">
                <!-- AFFICHE TOUS LES DOSSIERS COURANTS -->
                <?php
                $array = scandir($path_directory);
                // var_dump($array);
                
                for ($i = 0 ; $i < sizeof($array); $i++)
                {
                    echo "<a href='index.php?folder='><li>". $array[$i] . PHP_EOL . "</li></a>"; 
                }
                
                ?>
        </section>
    
    <section class="col-9 explorator">
            <!-- AFFICHE LE CONTENU DU DOSSIER SELECTIONNE -->
    </section>
</div>

</section>





<!-- <?php 
// ================ SCANDIR ================

$path_directory = "/home/wac/daisyB-repo/tweet_academie/Daisy";
    
    $dir = basename($path_directory);
    echo "<h3>/".$dir."</h3>";
    
    $array = scandir($path_directory);
    // var_dump($array);
    
    for ($i = 0 ; $i < sizeof($array); $i++)
    {
        echo "<li><a>". $array[$i] . "</a></li>"; 
    }

function scan($select)
{

    $path_directory = $select;


    $array = scandir($path_directory);
    // var_dump($array);
    
    for ($i = 0 ; $i < sizeof($array); $i++)
    {
        echo "<li><a>". $array[$i] . "</a></li>"; 
    }
}


?>
-->
</body>
</html>

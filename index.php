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

                function list_dir($dir)
                {
                    foreach(scandir($dir) as $filename)
                    {
                        
                        if($filename[0] === '.') continue;

                        $filepath = $dir.'/'.$filename;

                        // echo "<a href=''><li>". $filename. "</li></a>".PHP_EOL; 

                        if(is_dir($filepath))
                        {
                            echo "<a href=''><li>". $filename. "</li></a>".PHP_EOL; 
                            echo "OK IS DIR";
                        }



                            if(is_file($filepath))
                            {

                                echo "<a href='index.php?=readfile()'><ul>". $filename. "</ul></a>".PHP_EOL; 

                                // $fp = fopen($filepath, "r") or die("Vous n'avez pas les droits");
                                // echo "<div class='preview'>" . fread($fp, filesize($filepath)) . "</div>";
                                // fclose($fp);
                            }
                            foreach(list_dir($filepath) as $childFilename)
                            {

                                // echo "OK CHILDFILENAME";
                                // while (list_dir($childFilename, $level+2) && !in_array($childFilename, array(".", "..")))
                                // {
                                //     echo "OK IS FILE AND IS IN ARRAY";
                                //     for($i = 1; $i <= 4*$level; $i++)
                                //     {
                                //     echo "-----";
                                //     } 
                                //     list_dir($childFilename, $level+1);
                                // }
                                // // echo "<a href=''>". $childFilename . "</a>".PHP_EOL;
                               
                            }
                        }
                    }

                    function readfile($filepath)
                    {
                        $fp = fopen($filepath, "r") or die("Vous n'avez pas les droits");
                                    echo "<div class='preview'>" . fread($fp, filesize($filepath)) . "</div>";
                                    fclose($fp);
                    }
    

                list_dir("/home/wac/Documents")


                // function list_dir($name, $level=0)
                // {
                //     // $array = scandir($name);
                    
                //     if ($dir = opendir($name))
                //     {
                //         while ($file = readdir($dir))
                //         {
                //             for($i=1; $i<= 4*$level; $i++)
                //             {
                //                 echo "&nbsp;";
                //             }
                //             echo "$file<br>".PHP_EOL;

                //             if(is_dir($file) && !in_array($file, array(".", "..")))
                //             {
                //                 list_dir($file, $level+1);
                //             }
                            
                //         }
                //         closedir($dir);
                //     }
                    
                // }

                // list_dir("/home/wac/Documents");
                
                // $array = scandir($path_directory);
                // // var_dump($array);
                
                // for ($i = 0 ; $i < sizeof($array); $i++)
                // {
                //     echo "<a href='index.php?folder='><li>". $array[$i] . PHP_EOL . "</li></a>"; 
                // }

                // function list_dir($name, $level=0)
                
                // {
                //     if ($current = opendir($name))
                //     {
                //         while ($folder = readdir($current))
                //         {
                //             for($i=1; $i<= (4*$level); $i++)
                //             {
                //                 echo "&nbsp;";
                //             }
                //             echo "$folder<br>".PHP_EOL;

                //             if(is_dir($folder) && !in_array($folder, array(".", "..")))
                //             {
                //                 list_dir($folder, $level+1);
                //             }
                //         }
                //         closedir($current);
                //     }
                // }
                
                // list_dir(".");

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

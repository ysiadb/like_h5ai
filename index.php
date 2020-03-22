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
    <section class="container">
        <div class="row">
            <div class="header">
                <h1>My_H5ai</h1>
            </div>    
        </div>
        <div class="row path">
                <div class="col-6">

                    <?php 
                $host = $_SERVER['HTTP_HOST'];
                // echo $_SERVER['REQUEST_URI'];
                $path_directory = "/home/wac/daisyB-repo/";
                $display_path = str_replace('/',' > ', $path_directory);          
                echo $display_path ;
                
                // echo htmlentities($_GET['coucou']); sécurise les donnees recoltees. ou $coucou = htmlentities($_GET['coucou']);
            echo  '</div>
            
            <form class="col-6 search" action="index.php" method="get">
                <input type="text" name="folder" id="search">
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </section>
</header>
<section class="container main">
    <div class="row">
        <div class="col-3 menunav">
            <!-- AFFICHE TOUS LES DOSSIERS COURANTS -->
            <div class="col-12">';

                function list_dir($dir)
                {
                    // echo basename($dir);

                    foreach(scandir($dir) as $filename)
                    {
                        
                        if($filename[0] === '.') continue;

                        $filepath = $dir.'/'.$filename;

                        // echo "<a href=''><li>". $filename. "</li></a>".PHP_EOL; 

                        if(is_dir($filepath))
                        {
                            echo "<a href='index.php?folder=".$filename."'><li>". $filename. "</li></a>".PHP_EOL;  
                            // echo "OK IS A DIR";
                        }
                        if(is_file($filepath))
                        {
                            // $taille = filesize($filepath);
                            echo "<a href='index.php?file=".$filename."'><ul>". $filename. "</ul></a>".PHP_EOL;
                            // echo $taille . " bytes" ;

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

    

                list_dir("/home/wac/Documents");


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

               echo '</div>
                </div>
    
        <div class="col-9 explorator">
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">'; 
                echo "> <a href=''>". basename($_GET['folder']) . "</a>";
                
                echo '</div>
            <!-- AFFICHE LE CONTENU DU DOSSIER SELECTIONNE -->
';
          

                echo "<table class='col-12'><tr id='explo'><th class = 'col-8 '>Nom</th><th class='col-2 taille'>Taille</th><th class='col-2'>Dernières modifications</th></tr>";
                
                $filepath = "/home/wac/Documents/CR/";

                echo "<tr><td class='col-8'><a href='$filepath'>". basename($filepath) ."</a></td>";
                echo "<td class='col-2 table_data'>" . filesize($filepath) . " bytes</td>";
                echo "<td class='col-2 table_data'>" . date('F d Y, H:i', filemtime($filepath)) . "</td></tr>";
                
                // AFFICHE PREVIEW FICHIER
                // if(isset($_GET['file']) || is_file($filepath))
                // {
                //     $preview = fopen($filepath, "r") or die("Vous n'avez pas les droits");
                //     echo fread($preview, filesize($filepath));
                //     fclose($preview);
                //     // echo "OK";
                // }
                
                echo "</table>"
        
            ?>

        </div>
    </div>
    </section>

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

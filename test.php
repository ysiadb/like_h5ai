<?php


$ko = getcwd();

$test = dirname($ko, 1);

$lien = $_SERVER['REQUEST_URI'];

//TODO afiicher l'arboresence

function arborescence($fichier, $link, $chemin) {

    if (is_dir($fichier)) {

        if($ouverture = opendir($fichier)) {

            while(($file = readdir($ouverture))!== false) {

                if($file == ".." || $file == "." || $file == "my_h5ai") {

                    continue;
                } else {

                    //recuperer un fichier et afficher les sous dossier en fonction de l'url

                    $table = [];
                    if(is_dir($fichier ."/". $file)) {

                        echo "<a href='http://localhost/my_h5ai/".$file . "'>";
                        echo "<li class='list'>".$file ."</li></a>";
                        $verif = strpos($link ,"/my_h5ai/".$file);

                         if( $verif !== false){

                            $tab_2 = explode("/", $link);
                            unset($tab_2[0]);
                            unset($tab_2[1]);
                            $pat_1 = implode("/", $tab_2);
                            $add = $chemin . "/" . $pat_1;

                            if(is_dir($add)){

                                $open = opendir($add);

                                while($lire = readdir($open)){

                                    if ($lire != ".." && $lire != "."){

                                            array_push($table, $lire);
                                    }
                                }
                            }
                         }
                    } else {
                        if( $verif !== false){
                            array_push($table,  $file);
                        }
                    }

                    //TODO mettre l'arboresence en ordre alpha

                     sort($table);


                    echo "<ul>";

                    foreach($table as $value){
                        if(strpos($value, ".") == false){
                            echo  "<a href='".$link."/".$value . "'><li>". $value ."</li></a>";
                        }
                        else{
                            echo "<a href='".$link."/".$value . "'><li>".$value ."</li></a>";
                        }
                    }
                    echo "</ul>";
                }
            }
            // echo "</ul>";
        }
    } else {
        echo "Erreur, le paramètre précisé dans la fonction n'est pas un dossier!";
    }
}

arborescence($test, $lien, $test);



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


                  // AFFICHE PREVIEW FICHIER
                // if(isset($_GET['file']) || is_file($filepath))
                // {
                //     $preview = fopen($filepath, "r") or die("Vous n'avez pas les droits");
                //     echo fread($preview, filesize($filepath));
                //     fclose($preview);
                //     // echo "OK";
                // }




// RECURSIVE OK
                // function List_dir($dir)
                // {
                //     if(is_dir($dir))
                //     {
                //         $files = glob($dir. "*", GLOB_MARK);
                //         foreach($files as $file)
                //         {
                //             List_dir($file);
                //             echo "<a href=''><li>". $file. "</li></a>".PHP_EOL; 
                //         }
                //     }
                // }
                
                // List_dir("/home/wac/daisyB-repo/maquette-responsive");

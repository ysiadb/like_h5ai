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
<?php
session_start();
$_SESSION['pseudo'] = 'daisy';
$_SESSION['historique'] = $_SERVER['HTTP_REFERER'];
?>

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

    <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->

</head>

<body>

    <header>
        <section class="container-fluid">
            <div class="row">
                <div class="col-6 header">
                    <h1>My_H5ai</h1>
                </div>
                <!-- <div class="col-6 perso">
                    <form id="style" action="" method="post">
                        <div><h6 style="font-family: Sen; text-align: center">Style</h6></div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(60deg) grayscale(50%); border: 2px solid black">
                            <input type="checkbox" value="1">
                        </div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(10deg); border: 2px solid red">
                            <input type="checkbox" value="2">
                        </div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(240deg); border: 2px solid yellow">
                            <input type="checkbox" value="3">
                        </div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(540deg); border: 2px solid yellow">
                            <input type="checkbox" value="4">
                        </div>
                    </form>
                </div> -->
            </div>
            <div class="row path">
                <div class="col-3 ">

                    <?php
                    
                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=my_h5ai;charset=utf8', 'root', 'HelloRoot');
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    $host = $_SERVER['HTTP_HOST'];
                    $uri = $_SERVER['REQUEST_URI'];
                    $urii = explode("=", $uri);
                    // echo $_SERVER['REQUEST_URI'];
                    $path_directory = $urii[1];
                    $display_path = str_replace('/', ' > ', $path_directory);
                    // echo "<a href='index.php?folder=" . $path_directory ."'>".$display_path . "</a>";
                    echo $display_path;

                    // echo htmlentities($_GET['coucou']); sécurise les donnees recoltees. ou $coucou = htmlentities($_GET['coucou']);
                    echo  '
                    <div style="display:flex;"> 
                        <div class="retour">
                        <a href="javascript:history.go(-1)"><img id="navig" src="icon/left-squared-.png"></a>
                        </div>
                        <div class="suivant">
                        <a href="javascript:history.go(+1)"><img id="navig" src="icon/right-squared.png"></a>
                        </div>
                    </div>
                    </div>
                        <div class="col-6 search">
                            <form action="" method="post">
                                <input type="text" placeholder="Rechercher ..."name="folder" id="search">
                                <input type="submit" value="Go">
                            </form>
                        </div>
                    
                    <div class="col-3 perso">
                    <form id="style" action="" method="post">
                        <div><h6 style="font-family: Sen; margin-right: 7px; text-align: center">Style</h6></div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(60deg) grayscale(50%); border: 2px solid black">
                            <input type="checkbox" name="icolor" value="1">
                        </div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(10deg); border: 2px solid red">
                            <input type="checkbox" name="icolor" value="2">
                        </div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(240deg); border: 2px solid yellow">
                            <input type="checkbox" name="icolor" value="3">
                        </div>
                        <div id="perso">
                            <img src="icon/folder.png" id="icon" style="filter: hue-rotate(540deg); border: 2px solid yellow">
                            <input type="checkbox" name="icolor" value="4">
                        </div>
                        <button id="ok" type="submit">✔</button>
                    </form>
                </div>
                </div>
                </div>
            

            ';
                    if ($_POST['folder']) {
                        // var_dump($_POST['folder']);
                        $get_path = pathinfo($_POST['folder']);
                        $get_path2 = $get_path['dirname'] . "/" . $get_path['filename'];
                        // var_dump($get_path2);
                    }

                    if (isset($_POST['icolor'])) {
                        if ($_POST['icolor'] == '1') {
                            echo '<style>
                                #icon{
                                filter: hue-rotate(60deg) grayscale(50%); 
                                border: 2px solid black;
                                }
                                </style>';
                        }
                        if ($_POST['icolor'] == '2') {
                            echo '<style>
                                #icon{
                                    filter: hue-rotate(10deg); 
                                    border: 2px solid red;
                                }
                                </style>';
                        }
                        if ($_POST['icolor'] == '3') {
                            echo '<style>
                                #icon{
                                    filter: hue-rotate(240deg); 
                                    border: 2px solid yellow;
                                }
                                </style>';
                        }
                        if ($_POST['icolor'] == '4') {
                            echo '<style>
                                #icon{
                                    hue-rotate(540deg); 
                                    border: 2px solid yellow;
                                }
                                </style>';
                        }
                    }






                    echo '
    </section>
</header>
<section class="container-fluid main">
    <div class="row">
        <div class="col-3 menunav">
            <!-- AFFICHE TOUS LES DOSSIERS COURANTS -->
            <div class="col-12">';
                    global $url;

                    $url = $_SERVER['REQUEST_URI'];

                    function list_dir($dir)
                    {
                        // echo basename($dir);
                        global $filename;
                        // $filepath = $dir.'/'.$filename;

                        // echo "<a href=''><li>". $filename. "</li></a>".PHP_EOL; 

                        if (is_dir($dir)) {

                            global $filepath;
                            $filepath = glob($dir . "*", GLOB_MARK);
                            echo "<span><a href='index.php?folder=" . $filename . "'><img id='icon' src='icon/folder.png'>" . basename($filename) . "</a></span>" . PHP_EOL;
                            echo "<ul>";

                            // var_dump($filepath);
                            foreach ($filepath as $filename) {
                                // // echo " ";
                                if(is_dir($filename))
                                {

                                    list_dir($filename);

                                }
                                
                                // echo "<td><a href='index.php?file=" . $filepath . basename($filename) . "'><li>" . basename($filename) . "</li></a></td>" . PHP_EOL;
                            }
                            echo "</ul>";
                        }
                        // var_dump($filename);

                    }
                    global $path;
                    $path = ".";
                    list_dir($path);


                    echo '
                </div></div>
    
        <div class="col-9 explorator">
        <div class="container-fluid">
             <div class="row">
                <div class="col-6">';
                    if (isset($_GET['folder'])) {
                        echo "> <a id ='path' href='index.php?folder=" . $_GET['folder'] . "'>" . basename($_GET['folder']) . "</a>";
                    }
                    // if (isset($_GET['file'])) {
                    //     echo "> <a href='index.php?file='>" . basename($_GET['file']) . "</a>";
                    // }

                    echo "
                        </div>
                        <div class='col-6' id='tri'>

                        <form action='' method='post'>
                        <label>Trier par : </label>
                            <input type='checkbox' name='tri[]' value='nom'> Nom</input>
                            <input type='checkbox' name='tri[]' value='taille'> Taille</input>
                            <input type='checkbox' name='tri[]' value='modification'> Modification</input>
                            <input type='submit' value='Trier'>
                            </form>";

                    // var_dump($_POST);


                    echo '</div></div>
            <!-- AFFICHE LE CONTENU DU DOSSIER SELECTIONNE -->
';
                    echo "<div class='row'>
            <table class='col-12'>
                <tr id='explo'>
                    <th class = 'col-3 nom'>Nom</th>
                    <th class='col-2 taille'>Taille</th>
                    <th class='col-5 modif'>Modifé le</th>
                    <th class='col-2 tag' id=''>Tag</th>
                </tr>
                            </div>";




                    echo "<ul>";
                    $test = explode("=", $url);
                    global $test, $test2, $test;
                    $test2 = $path . "/" . $test[1];
                    $test3 = $test[1];
                    $test4 = rtrim($test3, 1);
                    
                    $histo = $_SESSION['historique'];
                    // var_dump($histo);
                    // var_dump($login);

                    function list_url($test3)
                    {

                        if (file_exists($test3)) {

                            if (is_dir($test3)) {

                                $dirop = opendir($test3);
                                $data = [];
                                // var_dump($dirop);
                                while (($filename = readdir($dirop)) !== false) {

                                    if ($filename != ".." && $filename != ".") {
                                        $pathinfo = pathinfo($filename);


                                        $nom = $filename;
                                        $taille = filesize($test3 . "/" . $filename);
                                        $modification = date(' d / m / y , H:i', filemtime($test3 . "/" . $filename));
                                        $data[] = array('nom' => $nom, 'taille' => $taille, 'modification' => $modification);
                                    }
                                }
                                $nom = array_column($data, 'nom');
                                $taille = array_column($data, 'taille');
                                $modification = array_column($data, 'modification');

                                
                                $tri = isset($_POST['tri']);
                                
                                if ($tri == false) 
                                {
                                    $_POST['tri'][0] = "nom";
                                }
                                

                                // var_dump($_POST['tri'][0]);
                                


                                if ($_POST['tri'][0] == "nom") {
                                    // var_dump($filename);
                                    array_multisort($nom, SORT_ASC, $data);


                                    foreach ($data as $value) {

                                        $chemin = $test3 .  $value['nom'];

                                        if (is_dir($chemin)) {
                                            echo "<tr><td class='col-3'><a href='index.php?folder=" . $test3 . $value['nom'] . "'><img id='icon'src='icon/folder.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                            echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                            echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                            echo "<td class='col-2 table_data'>" . "</td></tr>";
                                        } else {
                                            if ($pathinfo['extension'] === "jpg") {

                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/jpg.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" . filesize($test3 . "/" .  $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            }

                                            if ($pathinfo['extension'] === "png") {

                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/png.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" .  filesize($test3 . "/" .  $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" .  $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            } else {
                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/html.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" .  $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            }
                                        }
                                    }
                                }

                                if ($_POST['tri'][0] == "taille") {
                                    // var_dump($_POST);
                                    // echo "<pre>";
                                    // print_r($data);
                                    // echo "</pre>";

                                    array_multisort($taille, SORT_ASC, $data);
                                    // echo "<pre>";
                                    // print_r($data);
                                    // echo "</pre>";

                                    foreach ($data as $key => $value) {

                                        $chemin = $test3 . $value['nom'];
                                        // var_dump($value['nom']);


                                        if (is_dir($chemin)) {
                                            echo "<tr><td class='col-3'><a href='index.php?folder=" . $test3 . $value['nom'] . "'><img id='icon'src='icon/folder.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                            echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                            echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                            echo "<td class='col-2 table_data'>" . "</td></tr>";
                                        } else {
                                            if ($pathinfo['extension'] === "jpg") {

                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/jpg.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            }

                                            if ($pathinfo['extension'] === "png") {

                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/png.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" .  filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            } else {
                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/html.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            }
                                        }
                                    }
                                }

                                if ($_POST['tri'][0] == "modification") {

                                    array_multisort($modification, SORT_ASC, $data);


                                    foreach ($data as $key => $value) {

                                        $chemin = $test3 . $value['nom'];


                                        if (is_dir($chemin)) {
                                            echo "<tr><td class='col-3'><a href='index.php?folder=" . $test3 . $value['nom'] . "'><img id='icon'src='icon/folder.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                            echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                            echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                            echo "<td class='col-2 table_data'>" . "</td></tr>";
                                        } else {
                                            if ($pathinfo['extension'] === "jpg") {

                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/jpg.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            }

                                            if ($pathinfo['extension'] === "png") {

                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/png.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" .  filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            } else {
                                                echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/html.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            }
                                        }
                                    }


                                    if ($_POST['tri'][1] == "modification" and $_POST['tri'][0] == "taille") {

                                        array_multisort($modification, SORT_ASC, $taille, SORT_ASC, $data);

                                        foreach ($data as $key => $value) {
                                            $chemin = $test3 . "/" . $value['nom'];

                                            if (is_dir($chemin)) {
                                                echo "<tr><td class='col-3'><a href='index.php?folder=" . $test3 . $value['nom'] . "'><img id='icon'src='icon/folder.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                echo "<td class='col-2 table_data'>" . "</td></tr>";
                                            } else {
                                                if ($pathinfo['extension'] === "jpg") {

                                                    echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/jpg.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                    echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                    echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                    echo "<td class='col-2 table_data'>" . "</td></tr>";
                                                }

                                                if ($pathinfo['extension'] === "png") {

                                                    echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/png.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                    echo "<td class='col-2 table_data'>" .  filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                    echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                    echo "<td class='col-2 table_data'>" . "</td></tr>";
                                                } else {
                                                    echo "<tr><td class='col-3'><a href='index.php?file=" . $test3 . "/". $value['nom'] . "'><img id='icon'src='icon/html.png'><li>" . basename($value['nom']) . "</li></a></td>" . PHP_EOL;
                                                    echo "<td class='col-2 table_data'>" . filesize($test3 . "/" . $value['nom']) . " bytes</td>";
                                                    echo "<td class='col-5 table_data'>" . date(' d / m / y , H:i', filemtime($test3 . "/" . $value['nom'])) . "</td>";
                                                    echo "<td class='col-2 table_data'>" . "</td></tr>";
                                                }
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                    list_url($test3);
                    
                    // $gettag = $bdd->query('SELECT * FROM fichiers');
                    // $newchemin = str_replace('//', '/', $test3);


                    // while($tag = $gettag->fetch())
                    // {
                    //     var_dump($tag['nom']);
                    //     echo '       ok     ';
                    //     var_dump($newchemin);
                    //     echo "<td class='col-2 table_data'>" . $tag['tag']."</td></tr>";

                    //     if($tag['nom'] == $newchemin)
                    //     {
                    //         echo "<td class='col-2 table_data'>" . $tag['tag']."</td></tr>";

                    //     }
                    // }

                    echo "</ul></table>";
                    // var_dump($test);

                    if (isset($_GET['file'])) {
                        echo "<div id='previewarea'class='container-fluid' style='margin-top=10px;'><br><h3>Aperçu de ". basename($test3)."</h3><hr style='border= 2px solid black'><br>";

                        $preview = fopen($test3, "r") or die(" Erreur ! Vous n'avez pas les droits");
                        echo "<div id='previewarea'class='container-fluid'>" . fread($preview, filesize($test3)) . "</div><br>
                        <div class='container-fluid' style='text-align=right;'>
                        <div class='row'>
                        <div class='col-6'>
                            <form action='' method='post' style='text-align: left'>
                                <label></label>
                                <input type='text' name='tag' placeholder='Ajouter un tag à ce fichier'>
                                <button id='ok' type='submit'>✔</button>
                                </form>
                                <br>
                        </div>
                        ";
                        
                        $newchemin = str_replace('//', '/', $test3);

                        if(isset($_POST['tag']))
                        {
                            $bdd->query('INSERT INTO fichiers(nom, tag) VALUES("' . $newchemin.'", "'. $_POST['tag'].'")');

                        }
                        
                        fclose($preview);
                    }
                    $gettag = $bdd->query('SELECT * FROM fichiers');
                    $newchemin = str_replace('//', '/', $test3);

                    echo "<div class='col-6 tagarea' style='text-align:right'>"; 

                    while($tag = $gettag->fetch())
                    {
                        // var_dump($tag['nom']);
                        // echo '       ok     ';
                        // var_dump($newchemin);

                        if($tag['nom'] == $newchemin)
                        {   
                            echo "<a id='tagg'>#" . $tag['tag']."</a>  ";

                        }
                    }
                    echo "</div></div></div>";
                    // var_dump($test3)

                    ?>


                </div>
            </div>
        </section>

        </section>

</body>

</html>
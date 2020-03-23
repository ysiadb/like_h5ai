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
                    $uri = $_SERVER['REQUEST_URI'];
                    $urii = explode("=", $uri);
                    // echo $_SERVER['REQUEST_URI'];
                    $path_directory = $urii[1];
                    $display_path = str_replace('/', ' > ', $path_directory);
                    echo $display_path;

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
                    global $url;

                    $url = $_SERVER['REQUEST_URI'];

                    function list_dir($dir)
                    {
                        // echo basename($dir);
                        global $filename;
                        // $filepath = $dir.'/'.$filename;
                        
                        // echo "<a href=''><li>". $filename. "</li></a>".PHP_EOL; 
                        
                        if (is_dir($dir))
                        {
                            
                            global $filepath;
                            // $filepath = preg_grep('/^([^.])/',glob($dir."*", GLOB_MARK));
                            $filepath = glob($dir."*", GLOB_MARK);

                            echo "<span><a href='index.php?folder=" . $filename . "'><img id='icon' src='/icon/folder.png'><ul>" . basename($filename) . "</ul></a></span>" . PHP_EOL;

                            // var_dump($filepath);

                            foreach ($filepath as $filename) 
                            {
                                list_dir($filename);
                                // echo "<td><a href='index.php?file=" . basename($filename) . "'><li>" . basename($filename) . "</li></a></td>" . PHP_EOL;
                            }
                        }
                        // var_dump($filename);
                    }
                    global $path;
                    $path = "/home/wac/Documents";
                    list_dir($path);


                        echo '
                </div></div>
    
        <div class="col-9 explorator">
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">';
                        if (isset($_GET['folder'])) {
                            echo "> <a href='index.php?folder='>" . basename($_GET['folder']) . "</a>";
                        }
                        // if (isset($_GET['file'])) {
                        //     echo "> <a href='index.php?file='>" . basename($_GET['file']) . "</a>";
                        // }

                        echo '</div></div>
            <!-- AFFICHE LE CONTENU DU DOSSIER SELECTIONNE -->
';
                        echo "<div class='row'>
            <table class='col-12'><tr id='explo'><th class = 'col-6 '>Nom</th><th class='col-2 taille'>Taille</th><th class='col-4'>Modifé le</th></tr></div>";


                        

            echo "<ul>";
            $test = explode("=", $url);
            global $test, $test2, $test;
            $test2 = $path."/".$test[1];
            $test3 = $test[1];
            // var_dump($test3);

                    function list_url($test3)
                    {
                        if(file_exists($test3))
                        {
                            if(is_dir($test3))
                            {
                                $filepath = glob($test3."*", GLOB_MARK);

                                
                                foreach ($filepath as $filename) 
                                {
                                    list_url($filename);                           
                                    // echo "<a href=''><li>". $filename. "</li></a>".PHP_EOL; 
                                    
                                    if(is_dir($filename))
                                    {
                                        
                                        echo "<tr><td class='col-6'><a href='index.php?folder=" . $filepath . "'><li>" . basename($filename) . "</li></a></td>" . PHP_EOL;
                                        echo "<td class='col-2 table_data'>" . filesize($filepath) . " bytes</td>";
                                        echo "<td class='col-4 table_data'>" .  date(' d / m / y , H:i', filemtime($filepath)) . "</td></tr>";
                                        
                                        
                                        // echo "OK IS A DIR";
                                    }
                                    
                                    if (is_file($filename)) {
                                        $pathinfo = pathinfo($filename);

                                        if($pathinfo['extension'] === "jpg")
                                        {

                                            // $taille = filesize($filepath);
                                            echo "<tr><td class='col-6'><a href='index.php?file=" . $test3. basename($filename) . "'><img id='icon'src='/icon/jpg.png'><li>" . basename($filename) . "</li></a></td>" . PHP_EOL;
                                            echo "<td class='col-2 table_data'>" . filesize($filename) . " bytes</td>";
                                            echo "<td class='col-4 table_data'>" . date(' d / m / y , H:i', filemtime($filename)) . "</td></tr>";
                                        }
                                        
                                        if($pathinfo['extension'] === "png")
                                        {

                                            // $taille = filesize($filepath);
                                            echo "<tr><td class='col-6'><a href='index.php?file=" . $test3. basename($filename) . "'><img id='icon'src='/icon/png.png'><li>" . basename($filename) . "</li></a></td>" . PHP_EOL;
                                            echo "<td class='col-2 table_data'>" . filesize($filename) . " bytes</td>";
                                            echo "<td class='col-4 table_data'>" . date(' d / m / y , H:i', filemtime($filename)) . "</td></tr>";
                                            
                                        }
                                        else
                                        {
                                            echo "<tr><td class='col-6'><a href='index.php?file=" . $test3. basename($filename) . "'><img id='icon'src='/icon/html.png'><li>" . basename($filename) . "</li></a></td>" . PHP_EOL;
                                            echo "<td class='col-2 table_data'>" . filesize($filename) . " bytes</td>";
                                            echo "<td class='col-4 table_data'>" . date(' d / m / y , H:i', filemtime($filename)) . "</td></tr>";
                                        }
                                        // echo $taille . " bytes" ;
                                        
                                        // $fp = fopen($filepath, "r") or die("Vous n'avez pas les droits");
                                        // echo "<div class='preview'>" . fread($fp, filesize($filepath)) . "</div>";
                                        // fclose($fp);
                                    }
                                }
                            }
                        }
                    }
                    list_url($test3);

                    // function preview($test3)
                    // {
                        // }
                        
                        // preview($test3);
                        
                        
                        
                        echo "</ul></table>";
                        // var_dump($test);

                        if(isset($_GET['file']))
                        {
                            echo "<h1>Aperçu :</h1>";
                            
                                $preview = fopen($test3, "r") or die("Vous n'avez pas les droits");
                                echo "<div id='previewarea'class='container-fluid'>".fread($preview, filesize($test3)) . "</div>";
                                fclose($preview);
                        
                        }
                    


                    ?>

                </div>
            </div>
        </section>

        </section>

</body>

</html>
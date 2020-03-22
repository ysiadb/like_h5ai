<?php


function List_dir($dir)
{
    if(is_dir($dir))
    {
        $files = glob($dir. "*", GLOB_MARK);
        foreach($files as $file)
        {
            List_dir($file);
            echo "<a href=''><li>". $file. "</li></a>".PHP_EOL; 
        }
    }
}

List_dir("/home/wac/daisyB-repo/maquette-responsive");
?>
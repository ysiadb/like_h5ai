<?php
function preview($filepath)
                    {
                        $fp = fopen($filepath, "r") or die("Vous n'avez pas les droits");
                        echo "<div class='preview'>" . fread($fp, filesize($filepath)) . "</div>";
                        fclose($fp);
                    }

                    preview($filepath);
?>
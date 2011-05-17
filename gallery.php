<?php
require_once("lib/maininclude.php");

function is_empty_folder($folder)
{
    $c = 0;
    if( is_dir($folder) )
    {
        $files = opendir($folder);

        while ($file=readdir($files))
        {
            $c++;
        }
        if ( $c > 2 )
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

function main()
{
    printHeader("HNs - Kuvagalleria");
    print "\n<div id=\"content\">\n<br />";
    print "\n<h1 id=\"hgal\">Kuvagalleria</h1>";
    if ( $dirhandle = opendir('images/gallery') )
    {
        while (false !== ($dirname = readdir($dirhandle)))
        {
            if ($dirname != "." && $dirname != "..")
            {
                print "\n<div class=\"album\">";
                print "\n<h2> $dirname </h2>";

                if ($handle = opendir('images/gallery/'.$dirname.''))
                {
                    if ( is_empty_folder('images/gallery/'.$dirname.'') )
                    {
                        print "<p> Albumi on tyhj&auml;! </p>";
                    }
                    else
                    {
			print "\n<table class=\"albumtable\">";
                        print "\n<tr>";

                        $i = 0;

                        while (false !== ($file = readdir($handle)))
                        {
                            if ($file != "." && $file != "..")
                            {
                                print "\n  <td><a href=\"images/gallery/"
                                .$dirname."/".$file."\">".
                                "<img src=\"images/gallery/".$dirname."/".$file.""/></a</td>";
                            }
                            if ( $i > 9 )
                            {
                                $i = 1;
                                print "\n</tr>\n<tr>";
                            }
                            $i++;
                        }
                    }
                    closedir($handle);
                    print "\n</tr>";
                    print "\n</table>";
                }
                print "</div>";
		}
        }
    }
    closedir($dirhandle);

    print "\n</div>";
    printFooter();

}

main();


?>
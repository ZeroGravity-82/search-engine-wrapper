<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Awesome wrapper for search engines</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <form action="search" method="POST">
            <p>
                <!-- List of all supported search engines -->
                <?php
                $supportedEngines = $config['engines'];
                $defaultEngine = $config['defaults']['engine'];

                $listItemNumber = 0;
                foreach($supportedEngines as $engineName => $engineParams) {
                    $engineFullName = $engineParams['full_name'];
                    $isDefaultEngine = $engineName == $defaultEngine;

                    // An example of list item:
                    // <input type="radio" name="engine" value="google" id="radio1" checked><label for="radio1">Google</label><br>
                    $listItemNumber++;
                    $listItemTags =  "<input type=\"radio\" name=\"engine\" value=\"$engineName\" ";
                    $listItemTags .= "id=\"radio" . $listItemNumber . "\"";
                    if($isDefaultEngine) {
                        $listItemTags .= " checked";
                    }
                    $listItemTags .= "><label for=\"radio" . $listItemNumber . "\">";
                    $listItemTags .= "$engineFullName</label><br>";
                    echo "$listItemTags" . PHP_EOL;
                }
                ?>
                <input type="text" name="query">
                <input type="submit" value="Find">
        </form>
    </body>
</html>

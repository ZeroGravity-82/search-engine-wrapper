<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Awesome wrapper for search engines</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
    echo "<h1>Search results for: \"{$this->query}\" ({$this->engineFullName})</h1>";
    if(count($this->results) == 0) {
        echo "Nothing found :'(";
        return;
    }
?>
<table>
    <tr>
        <th>№</th>
        <th>Title</th>
        <th>URL</th>
        <th>Summary</th>
    </tr>
    <?php
        $resultNumber = 1;
        foreach($this->results as $result) {
            echo <<<EOT
            <tr>
            <td>$resultNumber</td>
            <td>{$result->getTitle()}</td>
            <td><a href="{$result->getUrl()}">{$result->getUrl()}</a></td>
            <td>{$result->getSummary()}</td>
            </tr>
EOT;
            $resultNumber++;
        }
    ?>
</table>
</body>
</html>

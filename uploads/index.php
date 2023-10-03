<?php

$directory = __DIR__; // current dir path
$parentDirectory = realpath($directory . '/..'); // parent dir path
$contents = scandir($directory); // contents in the cd
natcasesort($contents); // sort - alphabetically

echo "<h1> Index of /uploads </h1>";
echo '<table>';
echo '<tr><th>Name</th><th>Last Modified</th><th>Size</th></tr>';

if ($directory != $parentDirectory) {
    echo '<tr>';
    echo '<td></td>';
    echo '<td></td>';
    echo '</tr>';
}

// iterate through the contents of the directory
foreach ($contents as $item) {
    $itemPath = $directory . DIRECTORY_SEPARATOR . $item;

    // check whether its a dir / file
    if (is_dir($itemPath)) {
        // directory info
        echo '<tr>';
        echo '<td><a href="' . htmlspecialchars($item . '/') . '">' . $item . '/</a></td>';
        echo '<td>' . date('Y-m-d H:i:s', filemtime($itemPath)) . '</td>';
        echo '<td></td>';
        echo '</tr>';
    } else {
        // file info
        echo '<tr>';
        echo '<td><a href="' . htmlspecialchars($item) . '">' . $item . '</a></td>';
        echo '<td>' . date('Y-m-d H:i:s', filemtime($itemPath)) . '</td>';
        echo '<td>' . filesize($itemPath) . ' bytes</td>';
        echo '</tr>';
    }
}

echo '</table>';
?>


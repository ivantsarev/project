<?php

if (isset($_GET['next'])) {
    $dir = $_GET['next'];

} else {
    $dir = __DIR__;

}

$fileArray = scandir($dir);
if (__DIR__ != $dir) {
    echo "<a href='?next=$dir/..'>..</a><br>";
}


?>
<table border="1">

    <thead>
    <tr>
        <th>name
        <th>size
        <th>lastmod
        <th> createad
        <th>perms
    </tr>
    </thead>
    <tbody>

    <?php foreach ($fileArray as $file) {

        if (in_array($file, ['.', '..'])) continue;
        $stat= stat($file);
        $perms= fileperms($file);

        echo '<tr>';
        if (filetype($file) == 'dir') {
            echo "<td> <a href='?next=" . $dir . '\\' . $file . "&prev='$dir'>$file</a>";

        }      //echo $file.PHP_EOL;

        else {
            $info = (($perms & 0x0100) ? 'r' : '-');
            $info .= (($perms & 0x0080) ? 'w' : '-');
            $info .= (($perms & 0x0040) ?
                (($perms & 0x0800) ? 's' : 'x' ) :
                (($perms & 0x0800) ? 'S' : '-'));

// Group
            $info .= (($perms & 0x0020) ? 'r' : '-');
            $info .= (($perms & 0x0010) ? 'w' : '-');
            $info .= (($perms & 0x0008) ?
                (($perms & 0x0400) ? 's' : 'x' ) :
                (($perms & 0x0400) ? 'S' : '-'));

// World
            $info .= (($perms & 0x0004) ? 'r' : '-');
            $info .= (($perms & 0x0002) ? 'w' : '-');
            $info .= (($perms & 0x0001) ?
                (($perms & 0x0200) ? 't' : 'x' ) :
                (($perms & 0x0200) ? 'T' : '-'));
            echo "<td>" . $file ;
            echo "<td>" . $stat["size"];
            echo "<td>" . date ("d-m-Y h:i:s",$stat["mtime"]);
            echo "<td>" . date ("d-m-Y h:i:s",$stat["ctime"]);
            echo "<td>" . $info ;
        }
    }
    ?>
    </tbody>

</table>

<?php

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Текст, отправляемый в том случае,
    если пользователь нажал кнопку Cancel';
    exit;
} else {
    $autharray=["login"=>123];
    if ($autharray[$_SERVER['PHP_AUTH_USER']]!=$_SERVER['PHP_AUTH_PW']) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
    }

}

$content = '';
$file = fopen("db.txt",'a+');
while (!feof($file)){
    $content.= fread($file, 1024);
}
if(empty($content)){
    $content = [];
} else{
    $content = unserialize($content);
}

if (isset($_POST["action"])&&$_POST["action"]=="add_comment"){


    $content[]= $_POST;
    ftruncate($file, 0);
    fwrite($file, serialize($content));


}
fclose($file);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .cover{
            height: 30px;
            width: 30px;

            float: left;

        }

        .cover.txtcover {
            background: url(Logo/txt.png) 30px 30px;
            background-size: cover;
        }
        .cover.phpcover {
            background: url(Logo/php.png) 60px 30px;
            width: 60px;
            background-size: cover;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Test</a>
        </div>

    </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">

        </form>
        <div class = "container">
            <div class="wrapper">

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
                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <th>name
                        <th>size
                        <th>lastmod
                        <th> createad
                        <th>perms
                        <th>load
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
                            echo "<td colspan='5'> &nbsp;";
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
                            $pathParts = explode( ".",$file );
                            $ext=end($pathParts);
                            echo "<td><p class='cover ".$ext."cover'></p> " . $file ;
                            echo "<td>" . $stat["size"];
                            echo "<td>" . date ("d-m-Y h:i:s",$stat["mtime"]);
                            echo "<td>" . date ("d-m-Y h:i:s",$stat["ctime"]);
                            echo "<td>" . $info ;
                            echo "<td> <a class='btn btn-info' href='download.php?file=".base64_encode($dir . '\\'.$file)."'> download</a>";
                        }


                    }
                    ?>
                    </tbody>

                </table>



            </div>
        </div>

    </div>
</div>

<hr>

<footer>
    <p>&copy; 2016 Company, Inc.</p>
</footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>









<?php


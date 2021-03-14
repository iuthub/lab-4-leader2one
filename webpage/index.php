<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="viewer.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<div id="header">
    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>

<div id="listarea">
    <ul id="musiclist">
        <?php
        $size_unit = "b";
        $mp3_files = glob("songs/*.mp3");
        foreach ($mp3_files as $music) {
            $name = basename($music);
            $size = filesize($music);

            if ($size > 1024 && $size < 1024 * 1024) {
                $size = $size / 1024;
                $size_unit = "kb";
            } else if ($size > 1024 * 1024) {
                $size = (int)$size / 1024 / 1024;
                $size_unit = "mb";
            }
            ?>
            <li class="mp3item"><a
                        href="<?= $music ?>"><?= $name ?> </a> <?= " (" . (int)$size . " " . $size_unit . " )" ?> </li>
        <?php } ?>

        <?php
        $playlists = glob("songs/*.txt");
        foreach ($playlists as $playlist) {
            $playlist_name = basename($playlist);
            ?>
            <li class="playlistitem"><a href="playlists.php?data=<?php echo $playlist ?>"><?= $playlist_name ?> </a>
            </li>
        <?php } ?>
    </ul>
</div>
</body>
</html>
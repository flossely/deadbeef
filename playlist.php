<?php
$playlistFile = ($_REQUEST['name']) ? $_REQUEST['name'] : '';
$playlistOpen = file_get_contents($playlistFile);
$playlist = explode('|[1]|', $playlistOpen);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Playlist</title>
<link rel="shortcut icon" href="sys.deadbeef.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<script src="file.js?rev=<?=time();?>"></script>
<script src="edit.js?rev=<?=time();?>"></script>
<script src="manage.js?rev=<?=time();?>"></script>
<script src="http://www.midijs.net/lib/midi.js"></script>
</head>
<body>
<div class='top'>
<p align='center'>
<audio style="width:55%;position:relative;" id="audioPlayer" controls autoplay>
</p>
</div>
<div class='panel'>
<?php
foreach ($playlist as $key=>$part) {
    $partExp = explode('|[2]|', $part);
    $trackTitle = $partExp[0];
    $trackUri = $partExp[1];
?>
<p align='center'>
<input type='button' style="width:90%;position:relative;" value="<?=$trackTitle;?>" onclick="playAudio(audioPlayer, '<?=$trackUri;?>');">
</p>
<?php } ?>
</div>
</body>
</html>

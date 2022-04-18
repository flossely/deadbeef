<?php
$playlistUri = ($_REQUEST['uri']) ? hex2bin($_REQUEST['uri']) : '';
if ($playlistUri != '') {
    $currentPlaylistFile = file_get_contents($playlistUri);
    $currentPlaylist = explode(';', $currentPlaylistFile);
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Deadbeef</title>
<link rel="shortcut icon" href="sys.deadbeef.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<script src="file.js?rev=<?=time();?>"></script>
<script src="edit.js?rev=<?=time();?>"></script>
<script>
function openPlaylist(uri)
{
    window.location.href = 'deadbeef.php?uri=' + bin2hex(uri);
}
</script>
</head>
<body>
<div class='top'>
<p align='center'>
<select id='musicPlaylist' onchange="openPlaylist(musicPlaylist.options[musicPlaylist.selectedIndex].id);">
<option id='https://github.com/eurohouse/botticelli/blob/classic'>Classical</option>
<option id='https://github.com/eurohouse/botticelli/blob/modern'>Retro</option>
<option id='https://github.com/eurohouse/orchestra/blob/classic'>Lounge</option>
<option id='https://github.com/eurohouse/orchestra/blob/modern'>Chill</option>
</select>
<input type='button' class='actionButton' value="U" onclick="get('i','','from','deadbeef','','flossely',false);">
<input type='button' class='actionButton' value="X" onclick="window.location.href = 'index.php';">
</p>
</div>
<div class='panel'>
<p align='center'>
<?php
if ($playlistUri != '') {
foreach ($currentPlaylist as $key=>$item) {
    $fullAudioUri = $playlistUri . '/' . $item . '?raw=true';
?>
<input type='button' value="" onclick="playAudio(audioPlayer, '<?=$fullAudioUri;?>')">
<?php }} ?>
</p>
</div>
<audio id="audioPlayer">
</body>
</html>

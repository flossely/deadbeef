<?php
$dir = '.';
$list = str_replace($dir.'/','',(glob($dir.'/*.pl')));
if ($_REQUEST['name']) {
    $playlistFile = $_REQUEST['name'];
    $playlistOpen = file_get_contents($playlistFile);
} else {
    $playlistFile = '';
    $playlistOpen = '';
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Deadbeef</title>
<link rel="shortcut icon" href="sys.deadbeef.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<?php include 'base.incl.php'; ?>
<?php include 'file.incl.php'; ?>
<script>
function openPlaylist(name)
{
    window.location.href = 'deadbeef.php?name=' + name;
}
</script>
</head>
<body>
<div class='top'>
<p align='center'>
<select id='musicPlaylist' onchange="openPlaylist(musicPlaylist.options[musicPlaylist.selectedIndex].id);">
<option>Current</option>
<?php
foreach ($list as $key=>$value) {
    $playlistID = basename($value, '.pl');
?>
<option id="<?=$value;?>"><?=$playlistID;?></option>
<?php } ?>
</select>
<input type='button' class='actionButton' value="U" onclick="get('i','','from','deadbeef','','flossely',false);">
<input type='button' class='actionButton' value="X" onclick="window.location.href = 'index.php';">
</p>
</div>
<div class='panel'>
<?php
if ($playlistOpen != '') {
    $playlistArr = explode('|[1]|', $playlistOpen);
    foreach ($playlistArr as $key=>$part) {
        $playlistDiv = explode('|[2]|', $part);
        $playlistElemTitle = $playlistDiv[0];
        $playlistElemURI = $playlistDiv[1];
?>
<p align='center'>
<input type='button' style="width:90%;position:relative;" value="<?=$playlistElemTitle;?>" onclick="playAudio(audioPlayer, '<?=$playlistElemURI;?>')">
</p>
<?php }} ?>
</div>
<audio id="audioPlayer">
</body>
</html>

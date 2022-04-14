<?php
if (file_exists($_REQUEST['name'])) {
    $playfile = $_REQUEST['name'];
    $playOpen = file_get_contents($playfile);
    $playlist = explode('|[1]|', $playOpen);
} else {
    $dir = '.';
    $list = str_replace($dir.'/','',(glob($dir.'/*.{pl,pls}', GLOB_BRACE)));
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
</head>
<body>
<div class='top'>
<p align='center'>
<?php if (file_exists($_REQUEST['name'])) { ?>
<input type='button' class='actionButton' value="X" onclick="window.location.href = 'deadbeef.php';"> 
<?php } else { ?>
<input type='button' class='actionButton' value="X" onclick="window.location.href = 'index.php';"> 
<?php } ?>
<audio style="width:55%;position:relative;" id="audioPlayer" src="<?=$playerUri;?>" controls autoplay>
</p>
</div>
<div class='panel'>
<?php if (file_exists($_REQUEST['name'])) {
foreach ($playlist as $key=>$part) {
    $partExp = explode('|[2]|', $part);
    $trackTitle = $partExp[0];
    $trackUri = $partExp[1];
?>
<p align='center'>
<input type='button' style="width:90%;position:relative;" value="<?=$trackTitle;?>" onclick="playAudio(audioPlayer, '<?=$trackUri;?>');">
</p>
<?php }} else {
foreach ($list as $key=>$value) { ?>
<p align='center'>
<input type='button' style="width:90%;position:relative;" value="<?=$value;?>" onclick="window.location.href = 'deadbeef.php?name=<?=$value;?>';">
</p>
<?php }} ?>
</div>
</body>
</html>

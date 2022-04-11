<?php
$lastOpenedUser = file_get_contents('user.git.last');
$lastOpenedRepo = file_get_contents('repo.git.last');
$lastOpenedBranch = file_get_contents('branch.git.last');
$lastOpenedFilename = file_get_contents('filename.git.last');
$playerUri = 'https://github.com/'.$lastOpenedUser.'/'.$lastOpenedRepo.'/blob/'.$lastOpenedBranch.'/'.$lastOpenedFilename.'?raw=true';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Dead Beef Web Player</title>
<link rel="shortcut icon" href="sys.deadbeef.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<script src="jquery.js?rev=<?=time();?>"></script>
<script src="base.js?rev=<?=time();?>"></script>
<script src="file.js?rev=<?=time();?>"></script>
<script src="edit.js?rev=<?=time();?>"></script>
<script src="manage.js?rev=<?=time();?>"></script>
<script src="http://www.midijs.net/lib/midi.js"></script>
<script>
window.onload = function() {
    playAudio(audioPlayer, '<?=$playerUri;?>');
}
</script>
</head>
<body>
<div class='top'>
<p align='center'><audio style="width:55%;position:relative;" id="audioPlayer" src="<?=$playerUri;?>" controls autoplay></p>
</div>
<div class='panel'>
<p align='center'>
User: <br>
<input type="text" id="enterUser" value="<?=$lastOpenedUser;?>" style="width:55%;position:relative;">
</p>
<p align='center'>
Repo: <br>
<input type="text" id="enterRepo" value="<?=$lastOpenedRepo;?>" style="width:55%;position:relative;">
</p>
<p align='center'>
Branch: <br>
<input type="text" id="enterBranch" value="<?=$lastOpenedBranch;?>" style="width:55%;position:relative;">
</p>
<p align='center'>
Filename: <br>
<input type="text" id="enterFilename" value="<?=$lastOpenedFilename;?>" style="width:55%;position:relative;">
</p>
<p align='center'>
<input type="button" value="Launch" onclick="set('user.git.last', enterUser.value, true); set('repo.git.last', enterRepo.value, true); set('branch.git.last', enterBranch.value, true); set('filename.git.last', enterFilename.value, true); window.location.reload();">
<input type="button" value="Update" onclick="get('i','','from','deadbeef','','flossely', false);">
<input type="button" value="Exit" onclick="window.location.href = 'index.php';">
</p>
</div>
</body>
</html>

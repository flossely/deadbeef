<?php
$lastfile = ($_REQUEST['name']) ? $_REQUEST['name'] : ((file_exists('lastfile')) ? file_get_contents('lastfile') : 'bootup.flac');
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Dead Beef</title>
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
    document.getElementById('mediaURI').focus();
    document.getElementById('mediaURI').value = '<?=$lastfile;?>';
}
function get_uri_extension(uri) {
    return uri.split(/[#?]/)[0].split('.').pop().trim();
}
function defineFileFormat(uri) {
    var ext = get_uri_extension(uri);
    if (ext == 'avi' || ext == 'mpg' || ext == 'mpeg' || ext == 'mkv' || ext == 'mp4' || ext == 'mov' || ext == 'wmv') {
        return 'video';
    } else if (ext == 'mid' || ext == 'midi' || ext == 'rmi') {
        return 'midi';
    } else {
        return 'audio';
    }
}
function openURI(uri) {
    if (defineFileFormat(uri) == 'video') {
        playVideo(mediaPlayer, uri+'?rev=<?=time();?>');
    } else if (defineFileFormat(uri) == 'midi') {
        playMIDI(uri+'?rev=<?=time();?>');
    } else {
        playAudio(mediaPlayer, uri+'?rev=<?=time();?>');
    }
    set('lastfile', uri, true);
}
function closePlayer(uri) {
    if (defineFileFormat(uri) == 'video') {
        pauseVideo(mediaPlayer, uri+'?rev=<?=time();?>');
    } else if (defineFileFormat(uri) == 'midi') {
        pauseMIDI(uri+'?rev=<?=time();?>');
    } else {
        pauseAudio(mediaPlayer, uri+'?rev=<?=time();?>');
    }
    set('lastfile', uri, true);
}
</script>
</head>
<body>
<div class='top'>
<p align="center">
<input type="text" id="mediaURI" style="width:55%;position:relative;" placeholder="Please enter the mediafile URI" value="<?=$lastfile;?>" onkeydown="if (event.keyCode == 13) {
    openURI(mediaURI.value);
}" onchange="set('lastfile', this.value, true);">
<input type="button" class="actionButton" value=">" onclick="openURI(mediaURI.value);">
<input type="button" class="actionButton" value="<" onclick="closePlayer(mediaURI.value);">
<input type="button" class="actionButton" value="U" onclick="get('i','','from','deadbeef','','flossely',false);">
<input type="button" class="actionButton" value="X" onclick="window.location.href = 'index.php';">
</p>
</div>
<div class='panel'>
<video style="width:100%;height:100%;position:relative;" id="mediaPlayer" src="<?=$lastfile;?>" controls autoplay>
</div>
</body>
</html>

<?php

// Load bootstrap
require_once('bootstrap.php');
$uploads_folder = "../../uploads/";

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<title>TreeView</title>
<link rel="stylesheet" href="button/jquery.treeview.css" />
<script type="text/javascript" src="<?php echo plugins_url('/stream-video-player/button/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('/stream-video-player/button/jquery.treeview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('/stream-video-player/button/medialib.js'); ?>"></script>
</head>
<body>


<div id="wbtitle"><?php echo $_GET['wtitle']; ?></div>


<div id="flbrow">
<ul id="browser" class="filetree">
  <li><span class="folder" id="uplds"><a href="<?php echo $uploads_folder; ?>">Uploads</a></span>
    <?php echo makeULLI(readDirR($uploads_folder)); ?>
</ul>
</div>
<div id="ftr">
<span id="fl"><?php _e('Select a file', 'stream-video-player'); ?>Select a file</span>
<span id="fr">
<input type="submit" id="Login" value="&nbsp;&nbsp;Ok&nbsp;&nbsp;" onclick="self.parent.tb_remove();" />
</span>
</div>
</body>
</html>
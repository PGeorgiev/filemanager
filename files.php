<?php
include 'includes/config.php';
include 'includes/session.php';
include 'includes/functions.php';
include 'phtml/header.php';

$files = fm_get_user_files(session_get_user());
?>

<div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <span class="navbar-brand">Files</span>
        <a class="btn btn-primary navbar-btn pull-left" href="upload.php" title="Upload new file"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</a>
    </div>
</div>

<table class="table table-condensed table-hover table-responsive">
    <thead>
        <tr>
            <th>Filename</th>
            <th class="col-md-2">Size</th>
            <th class="col-md-2">Upload Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($files as $filename => $fileinfo): ?>
        <tr>
            <td><a class="btn btn-default btn-sm" href="download.php?file=<?php echo urlencode($filename) ?>"><span class="glyphicon glyphicon-cloud-download"></span></a> <?php echo htmlentities($filename); ?></td>
            <td><?php echo $fileinfo['filesize'] ?> bytes</td>
            <td><?php echo date('d.m.Y H:i:s', $fileinfo['filemtime']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include 'phtml/footer.php';

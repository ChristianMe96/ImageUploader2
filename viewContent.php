<?php
include 'fileProcessing.php';
$fileProcessing = new FileProcessing();

?>
<html>
<head>
    <title>View</title>
</head>
<body>
<h3><?php $fileProcessing->viewTitle() ?></h3>
<figure>
    <img src="<?php $fileProcessing->viewNewFileName() ?>" alt="The Pulpit Rock" width="304" height="228">
</figure>
<p>ahhahl,ö,öa</p>

</body>
</html>
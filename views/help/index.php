<?php
$template = new NetMon\Template("help/index.html");

$helpModel = new NetMon\Models\Help();
$helpModel->Message = "This is a help message";

$template->Set("message", $helpModel->Message);

$template->Show();
?>

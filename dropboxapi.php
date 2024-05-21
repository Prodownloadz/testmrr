<?php

require './vendor/autoload.php';

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;

//Configure Dropbox Application
$app = new DropboxApp("embqzkaia7t4fun", "4qedhd17fxmwdyz", "sl.A19q_VeX7__7usBh-xm2f41XW0a94ribnOBRzdUAHsavAepMM5SEvAHCNnWl_XGxI1HKKnJM5ejrFPUJEP7HVbiwhoU29sZRlW3uS5w1jZpmT7T-d5EO9CpWWVYbSf0xyU6pXG0");
//echo $app;
//Configure Dropbox service
$dropbox = new Dropbox($app);

$pathToLocalFile = __DIR__ . "/admin/webupload/output/20210804013716985952doc.pdf";

//include './admin/webupload/output/20210804013716985952doc.pdf';

$dropboxFile = new DropboxFile($pathToLocalFile);

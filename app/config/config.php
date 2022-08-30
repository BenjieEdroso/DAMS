<?php
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "dams");
define("APPROOT", dirname(dirname(__FILE__)));
define("ARCHIVE_PATH", APPROOT . "\drive_main\\");;
define("BACKUP_PATH", "D:\backup\\");
define("URLROOT", "http://localhost/dams");
define("SITENAME", "DAMS");
define("KB", 1024);
define("MB", 1048576);
define("GB", 1073741824);
define("TB", 1099511627776);
$keyFile = fopen(APPROOT . "/config/dams_secret.txt", "r");
define("SECRET_KEY", fread($keyFile, filesize(APPROOT . "/config/dams_secret.txt")));
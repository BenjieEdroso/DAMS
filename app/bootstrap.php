<?php

require_once 'config/config.php';
require_once 'helpers/url_redirect.php';
require_once 'helpers/data_unset.php';
require_once 'helpers/format_size.php';
require_once 'helpers/condition.php';
require_once 'helpers/request_count.php';

// Load Libraries
spl_autoload_register(function ($className) {

  require_once 'libraries/' . $className . '.php';
});
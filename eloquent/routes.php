<?php
// Import all routes from the config.
$modules = require './config/routes.php';
foreach ($modules as $module) {
    require './module/' . $module . 'index.php';
}

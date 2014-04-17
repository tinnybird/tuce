<?php


$CONFIG = array();

// -------------------------  CONFIG DATABASE  -------------------------- //
$CONFIG['database']['default']['adapter'] = 'mysqli';
$CONFIG['database']['default']['host'] = 'localhost';
$CONFIG['database']['default']['port'] = '3306';
$CONFIG['database']['default']['dbuser'] = 'root';
$CONFIG['database']['default']['dbpass'] = 'root';
$CONFIG['database']['default']['dbname'] = 'tuben';
$CONFIG['database']['default']['pconnect'] = '';
$CONFIG['database']['default']['charset'] = 'utf8';
$CONFIG['database']['default']['pre'] = 'meu_';

// -----------------------  CONFIG CACHE_ENGINE  ------------------------ //
$CONFIG['cache_engine'] = 'file';

// -----------------------  CONFIG CACHE_POLICY  ------------------------ //
$CONFIG['cache_policy']['life_time'] = 900;

// ----------------------  CONFIG STORAGE_ENGINE  ----------------------- //
$CONFIG['storage_engine'] = 'file';

// ------------------------  CONFIG IMG_ENGINE  ------------------------- //
$CONFIG['img_engine'] = 'gd';

// ------------------------  CONFIG COOKIE_NAME  ------------------------ //
$CONFIG['cookie_name'] = 'MPIC_TEHA';

// ----------------------  CONFIG COOKIE_AUTH_KEY  ---------------------- //
$CONFIG['cookie_auth_key'] = 'aCfebwlG6ics';

// -----------------------  CONFIG COOKIE_DOMAIN  ----------------------- //
$CONFIG['cookie_domain'] = '';

// -----------------------  CONFIG IMG_PATH_KEY  ------------------------ //
$CONFIG['img_path_key'] = 'hU6FU9z9mH';

// -------------------------  CONFIG SAFEMODE  -------------------------- //
$CONFIG['safemode'] = '';


// -------------------  THE END  -------------------- //

?>
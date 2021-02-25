<?php

//BASIC CONFIGURATIONS
define('DS', DIRECTORY_SEPARATOR);
define('PATH', realpath(dirname(__FILE__)));
define('VIEWS_PATH',PATH.DS.'views'.DS);

//template
defined('TEMPLATE_PATH')            ? null : define("TEMPLATE_PATH", PATH.DS."template"); 
defined("LANGUAGE_PATH")            ? null : define("LANGUAGE_PATH",PATH.DS."languages");
defined("DEFAULT_LANGUAGE")         ? null : define("DEFAULT_LANGUAGE", "en");

//DATABASE
defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')       ? null : define ('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', '');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'bio_ware');
defined('DATABASE_PORT_NUMBER')     ? null : define ('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')     ? null : define ('DATABASE_CONN_DRIVER', 1);

//session
defined('SESSION_NAME')             ? null : define('SESSION_NAME', 'BioWare');
defined('SESSION_SAVE_PATH')        ? null : define('SESSION_SAVE_PATH', PATH.DS.'sessions');
defined('SESSION_LIFE_TIME')        ? null : define('SESSION_LIFE_TIME', 0);
defined("HTTP_ONLY")                ? null : define("HTTP_ONLY", true);

//encryption
defined("CIPHERALGO")               ? null : define("CIPHERALGO", "AES-128-CBC");
defined("IV")                       ? null : define("IV",'3334353833343739');
defined("CIPHERKEY")                ? null : define("CIPHERKEY", "ak!o&2a/@oxun*ym");

//hashing 
defined('SALT')                     ? null :define('SALT', '$2a$07$oqmaSNwlemapOhv0TrrReP$');

//uploaded files
defined('UPLOAD_STORAGE')           ? null : define ('UPLOAD_STORAGE', PATH . DS . '..' . DS . 'public' . DS . 'uploads');
defined('IMAGES_UPLOAD_STORAGE')    ? null : define ('IMAGES_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'images');
defined('DOCUMENTS_UPLOAD_STORAGE') ? null : define ('DOCUMENTS_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'documents');
defined('MAX_FILE_SIZE_ALLOWED')    ? null : define ('MAX_FILE_SIZE_ALLOWED', ini_get('upload_max_filesize'));

//api
defined('VENDOR_PATH')              ? null : define("VENDOR_PATH", PATH.DS.'..'.DS."vendor"); 
defined('API_PATH')                 ? null : define("API_PATH", PATH.DS.'api'); 
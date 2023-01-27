<?php

require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$configfiles = loadFileData(_CONFIG_DIR);

$app = new App\Core\Application(__DIR__, $configfiles);

$app->db->applyMigrations();

<?php
/**
 * Файл запуска задания 1.
 */


include('vendor/autoload.php');

$mysqlIp = $_ENV['MYSQL56_PORT_3306_TCP_ADDR'];
$mysqlPort = $_ENV['MYSQL56_PORT_3306_TCP_PORT'];
$mysqlDatabase = $_ENV['MYSQL_ENV_MYSQL_DATABASE'];
$mysqlUser = $_ENV['MYSQL_ENV_MYSQL_USER'];
$mysqlPassword = $_ENV['MYSQL_ENV_MYSQL_PASSWORD'];


/** @var PDO $pdo */
$pdo = new \PDO('mysql:host=' . $mysqlIp . ':' . $mysqlPort . ';dbname=' . $mysqlDatabase . ';charset=utf8', $mysqlUser,
    $mysqlPassword, [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

/** @var Init $init */
$init = new \Init($pdo);

foreach ($init->get() as $item) {
    echo sprintf('| %\'. 3d | %s | %s | %\'. 3d | %\'. 7s | ' . PHP_EOL, $item['id'],
        $item['script_name'],
        $item['start_time'],
        $item['sort_index'],
        $item['result']
    );
}

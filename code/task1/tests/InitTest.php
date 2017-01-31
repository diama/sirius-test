<?php

/**
 * Created by PhpStorm.
 * User: diama
 * Date: 30.01.17
 * Time: 19:33
 */
class InitTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return ReflectionClass
     */
    public function testClass()
    {
        $reflect = new ReflectionClass(Init::class);
        $this->assertTrue($reflect->isFinal());
        $this->assertTrue($reflect->hasMethod('__construct'));

        return $reflect;
    }

    /**
     * @depends testClass
     * @param ReflectionClass $class
     */
    public function testCreateMethod(ReflectionClass $class)
    {
        $this->assertTrue($class->hasMethod('create'));
        $method = $class->getMethod('create');
        $this->assertTrue($method->isProtected());
    }

    /**
     * @depends testClass
     * @param ReflectionClass $class
     */
    public function testFillMethod(ReflectionClass $class)
    {
        $this->assertTrue($class->hasMethod('fill'));
        $method = $class->getMethod('fill');
        $this->assertTrue($method->isProtected());
    }

    /**
     * @depends testClass
     * @param ReflectionClass $class
     */
    public function testGetMethod(ReflectionClass $class)
    {
        $this->assertTrue($class->hasMethod('get'));
        $method = $class->getMethod('get');
        $this->assertTrue($method->isPublic());

        $mysqlIp = $_ENV['MYSQL56_PORT_3306_TCP_ADDR'];
        $mysqlPort = $_ENV['MYSQL56_PORT_3306_TCP_PORT'];
        $mysqlDatabase = $_ENV['MYSQL_ENV_MYSQL_DATABASE'];
        $mysqlUser = $_ENV['MYSQL_ENV_MYSQL_USER'];
        $mysqlPassword = $_ENV['MYSQL_ENV_MYSQL_PASSWORD'];


        /** @var PDO $pdo */
        $pdo = new \PDO('mysql:host=' . $mysqlIp . ':' . $mysqlPort . ';dbname=' . $mysqlDatabase . ';charset=utf8',
            $mysqlUser,
            $mysqlPassword, [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ]);

        /** @var Init $init */
        $init = new \Init($pdo);

        foreach ($init->get() as $item) {
            $this->assertArrayHasKey('result', $item);
            $this->assertTrue(in_array($item['result'], [Init::RESULT_NORMAL, Init::RESULT_SUCCESS]));
        }

    }


}

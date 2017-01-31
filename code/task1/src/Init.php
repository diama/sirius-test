<?php

/**
 * Class Init
 */
final class Init
{
    /**
     * @const RESULT_NORMAL Результат normal
     */
    const RESULT_NORMAL = 'normal';

    /**
     * @const RESULT_ILLEGAL Результат illegal
     */
    const RESULT_ILLEGAL = 'illegal';

    /**
     * @const RESULT_FAILED Результат failed
     */
    const RESULT_FAILED = 'failed';

    /**
     * @const RESULT_SUCCESS Результат success
     */
    const RESULT_SUCCESS = 'success';

    /**
     * @const TABLE_NAME имя таблицы в БД
     */
    const TABLE_NAME = 'task1';

    /**
     * @var PDO объект PDO для подключения к БД
     */
    protected $pdo;

    /**
     * @var array список доступных результатов
     */
    protected $allowedStatuses = [
        self::RESULT_NORMAL,
        self::RESULT_ILLEGAL,
        self::RESULT_FAILED,
        self::RESULT_SUCCESS,
    ];

    /**
     * Init constructor.
     * @param PDO $PDO
     */
    public function __construct(PDO $PDO)
    {
        $this->pdo = $PDO;

        $this->create();
        $this->fill();
    }

    /**
     * Метод создания таблицы
     */
    protected function create(): void
    {
        $this->pdo->query('DROP TABLE IF EXISTS `' . self::TABLE_NAME . '`;');

        $allowedStatuses = '\'' . implode('\',\'', $this->allowedStatuses) . '\'';

        $this->pdo->query('
            CREATE TABLE IF NOT EXISTS `' . self::TABLE_NAME . '` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `script_name` VARCHAR(25) NOT NULL DEFAULT \'\' COLLATE \'utf8_unicode_ci\',
                `start_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `sort_index` INT(3) NOT NULL,
                `result` ENUM(' . $allowedStatuses . ') NOT NULL,
                PRIMARY KEY (`id`)
            ) COLLATE=\'utf8_unicode_ci\' ENGINE=InnoDB;
        ')->execute();
    }

    /**
     * Метод для наполнения таблицы данными
     */
    protected function fill(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $randomResult = rand(0, 3);
            $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (`script_name`, `sort_index`, `result`) VALUES (:script_name, :sort_index, :result);';
            $this->pdo->prepare($sql)->execute([
                ':script_name' => substr(md5($i), 0, 25),
                ':sort_index'  => rand(0, 999),
                ':result'      => $this->allowedStatuses[$randomResult],
            ]);
        }
    }

    /**
     * Метод возвращает генератор со списком результатов RESULT_NORMAL и RESULT_SUCCESS
     * @return Generator
     */
    public function get(): Generator
    {
        $sql = 'SELECT * FROM `' . self::TABLE_NAME . '` WHERE `result` IN (:result_normal, :result_success);';
        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':result_normal'  => self::RESULT_NORMAL,
            ':result_success' => self::RESULT_SUCCESS,
        ]);

        while ($row = $statement->fetch()) {
            yield $row;
        }

    }
}
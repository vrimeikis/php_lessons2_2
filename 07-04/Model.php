<?php

declare(strict_types = 1);

include __DIR__.'/DB.php';

abstract class Model
{
    protected $table;

    protected $connection;

    public function __construct()
    {
        $this->connection = (new DB())->getConnection();
    }

    abstract protected function fillObject(int $id): void;

    abstract public function save(): void;

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getById(int $id): array {

        $sql = sprintf(
            'SELECT * FROM %s WHERE id = %d',
            $this->table,
            $id
        );

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch();

        if (empty($result)) {
            throw new Exception(
                'Model not found with id = '. $id,
                404
            );
        }

        return $result;
    }
}
<?php

namespace Drupal\chem_inv;

use Drupal\Core\Database\Connection;
use Drupal\Core\Database\StatementInterface;
use Exception;

/**
 * Entities service.
 */
class Entities
{
    /**
     * Compounds table name
     */
    public const COMPOUNDS_TABLE = 'chem_inv_compounds';

    /**
     * The database connection.
     *
     * @var Connection
     */
    protected Connection $connection;

    /**
     * Constructs an Entities object.
     *
     * @param Connection $connection
     *   The database connection.
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Retrieve all compounds from DB
     *
     * @return mixed
     */
    public function getAllCompounds()
    {
        return $this->connection
            ->select(self::COMPOUNDS_TABLE, 'c')
            ->fields('c')
            ->execute()
            ->fetchAllAssoc('id');
    }

    /**
     * Add new compound to DB
     *
     * @param array $fields_values
     *
     * @return StatementInterface|int|string|null
     *
     * @throws Exception
     */
    public function addCompound(array $fields_values)
    {
        return $this->connection
            ->insert(self::COMPOUNDS_TABLE)
            ->fields($fields_values)
            ->execute();
    }
}

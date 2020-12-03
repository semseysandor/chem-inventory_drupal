<?php

namespace Drupal\chem_inv;

use Drupal\Core\Database\Connection;

/**
 * Entities service.
 */
class Entities {

    public const COMPOUNDS_TABLE='chem_inv_compounds';

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected Connection $connection;

  /**
   * Constructs an Entities object.
   *
   * @param \Drupal\Core\Database\Connection $connection
   *   The database connection.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * Method description.
   */
  public function doSomething() {
    return 'kutyamajom';
  }

    public function getAllCompounds()
    {
        return $this->connection->select(self::COMPOUNDS_TABLE,'c')->fields('c')->execute()->fetchAllAssoc('id');
  }

    public function addCompound(array $fields_values)
    {
        $query = $this->connection->insert(self::COMPOUNDS_TABLE);
        $query->fields($fields_values)->execute();
//        $this->messenger()->addStatus(
//            $this->t('The message has been sent.')
//        );
  }
}

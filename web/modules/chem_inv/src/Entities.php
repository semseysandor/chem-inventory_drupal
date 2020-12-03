<?php

namespace Drupal\chem_inv;

use Drupal\Core\Database\Connection;

/**
 * Entities service.
 */
class Entities {

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;

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
    // @DCG place your code here.
  }

}

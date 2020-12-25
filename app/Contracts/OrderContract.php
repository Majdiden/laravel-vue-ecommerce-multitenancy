<?php

namespace App\Contracts;

/**
 *
 */
interface OrderContract
{
  public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

  public function findOrderByNumber($orderNumber);

  public function storeOrderDetails(array $params);
}

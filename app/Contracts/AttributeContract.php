<?php

namespace App\Contracts;


/**
 *
 */
interface AttributeContract
{

  public function listAttributes(string $order='id', string $sort='desc', array $columns=['*']);

  public function findAttributeById(int $id);

  public function createAttribute(array $params);

  public function updateAttribute(array $params);

  public function deleteAttribute($id);
}

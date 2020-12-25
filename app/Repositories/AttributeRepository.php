<?php

namespace App\Repositories;

use App\Attribute;
use App\Contracts\AttributeContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class AttributeRepository implements AttributeContract
{
  public function __construct(Attribute $model){
        $this->model = $model;
  }

  public function listAttributes(string $order='id', string $store='desc', array $columns=['*'])
  {
      return Attribute::all($columns, $order, $store);
  }

  public function findAttributeById(int $id)
  {
    try {
      return $this->findOrFail($id);
    }
    catch(ModelNotFoundException $e) {
          throw new ModelNotFoundException($e);
    }
  }

  public function createAttribute(array $params)
  {
    try {
      $collection = collect($params);

      $is_filterable = $collection->has('is_filterable') ? 1 : 0;
      $is_required = $collection->has('is_required') ? 1 : 0;

      $merge = $collection->merge(compact('is_filterable', 'is_required'));

      $attribute = new Attribute($merge->all());

      $attribute->save();

      return $attribute;
    }

    catch(QueryException $exception){
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  public function updateAttribute(array $params)
  {
    $attribute = $this->findAttributeById($params['id']);

    $collection = collect($params)->except('_token');

    $is_filterable = $collection->has('is_filterable') ? 1 : 0;
    $is_required = $collection->has('is_required') ? 1 : 0;

    $merge = $collection->merge(compact('is_filterable', 'is_required'));

    $attribute->update($merge->all());

    return $attribute;
  }

  public function deleteAttribute($id)
   {
       $attribute = $this->findAttributeById($id);

       $attribute->delete();

       return $attribute;
   }

}

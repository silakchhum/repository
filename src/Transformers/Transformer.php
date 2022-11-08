<?php

namespace Phumsoft\Repository\Transformers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

abstract class Transformer extends TransformerAbstract
{
    /**
     * Transform the BookPresenter entity.
     *
     * @param  Illuminate\Database\Eloquent\Model  $model
     * @return array
     */
    public function transform(Model $model)
    {
        return $model->toArray();
    }
}

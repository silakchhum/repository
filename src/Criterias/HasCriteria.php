<?php

namespace Phumsoft\Repository\Criterias;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class HasCriteria
 */
class HasCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param  Builder|Model  $model
     * @param  RepositoryInterface  $repository
     * @return mixed
     *
     * @throws \Exception
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $has = request()->get('has', null);
        $doesntHave = request()->get('doesntHave', null);

        if ($has) {
            $hases = explode(';', $has);
            foreach ($hases as $has) {
                $model = $model->has($has);
            }
        }

        if ($doesntHave) {
            $doesntHaves = explode(';', $doesntHave);
            foreach ($doesntHaves as $doesntHave) {
                $model = $model->doesnthave($doesntHave);
            }
        }

        return $model;
    }
}

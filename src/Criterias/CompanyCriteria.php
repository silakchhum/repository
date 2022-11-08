<?php

namespace Phumsoft\Repository\Criterias;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CompanyCriteria
 */
class CompanyCriteria implements CriteriaInterface
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
    public function apply($model)
    {
        $company = request()->company;

        $model = $model->whereHas('company', function ($q) use ($company) {
            $q->where('companies.id', $company->id);
        });

        return $model;
    }
}

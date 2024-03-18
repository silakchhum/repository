<?php

namespace Phumsoft\Repository\Repositories;

use Phumsoft\Repository\Criterias\HasCriteria;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository as BaseRepo;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class Repository.
 */
abstract class Repository extends BaseRepo implements CacheableInterface
{
    use CacheableRepository;

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class))
            ->pushCriteria(HasCriteria::class);
    }

    /**
     * Return data for pagination or all
     *
     * @return array array.
     */
    public function toList()
    {
        if (!request()->get('page')) {

            return $this->all();
        } else {
            $limit = request()->get('limit', 15);

            return $this->paginate($limit, '*');
        }
    }
}

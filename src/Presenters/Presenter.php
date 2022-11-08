<?php

namespace Phumsoft\Repository\Presenters;

use Exception;
use Prettus\Repository\Presenter\FractalPresenter;

abstract class Presenter extends FractalPresenter
{
    /**
     * BasePresenter constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();
    }
}

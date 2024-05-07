<?php

namespace Modules\Ibuilder\Repositories\Cache;

use Modules\Ibuilder\Repositories\LayoutRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheLayoutDecorator extends BaseCacheCrudDecorator implements LayoutRepository
{
    public function __construct(LayoutRepository $layout)
    {
        parent::__construct();
        $this->entityName = 'ibuilder.layouts';
        $this->repository = $layout;
    }
}

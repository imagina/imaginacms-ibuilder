<?php

namespace Modules\Ibuilder\Repositories\Cache;

use Modules\Ibuilder\Repositories\BuildableRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheBuildableDecorator extends BaseCacheCrudDecorator implements BuildableRepository
{
    public function __construct(BuildableRepository $buildable)
    {
        parent::__construct();
        $this->entityName = 'ibuilder.buildables';
        $this->repository = $buildable;
    }
}

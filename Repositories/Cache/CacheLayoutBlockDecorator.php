<?php

namespace Modules\Ibuilder\Repositories\Cache;

use Modules\Ibuilder\Repositories\LayoutBlockRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheLayoutBlockDecorator extends BaseCacheCrudDecorator implements LayoutBlockRepository
{
    public function __construct(LayoutBlockRepository $layoutblock)
    {
        parent::__construct();
        $this->entityName = 'ibuilder.layoutblocks';
        $this->repository = $layoutblock;
    }
}

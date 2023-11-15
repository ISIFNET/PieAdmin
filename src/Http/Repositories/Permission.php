<?php

namespace Isifnet\PieAdmin\Http\Repositories;

use Isifnet\PieAdmin\Repositories\EloquentRepository;

class Permission extends EloquentRepository
{
    public function __construct()
    {
        $this->eloquentClass = config('admin.database.permissions_model');

        parent::__construct();
    }
}

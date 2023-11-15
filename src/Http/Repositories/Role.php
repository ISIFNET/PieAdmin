<?php

namespace Isifnet\PieAdmin\Http\Repositories;

use Isifnet\PieAdmin\Repositories\EloquentRepository;

class Role extends EloquentRepository
{
    public function __construct($relations = [])
    {
        $this->eloquentClass = config('admin.database.roles_model');

        parent::__construct($relations);
    }
}

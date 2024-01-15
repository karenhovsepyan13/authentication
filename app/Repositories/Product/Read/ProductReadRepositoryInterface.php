<?php

namespace App\Repositories\Product\Read;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface ProductReadRepositoryInterface
{
    public function read($userId):Collection|array;
}

<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function create(array $attributes): Model;

    public function find($id): ?Model;

    public function all(): Collection;
}

<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function findAll();

    public function findById($id);

    public function create(array $attribute);

    public function update($id, array $attribute);

    public function delete($id);
    
}

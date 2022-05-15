<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel(): string;

    public function setModel(): void
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attribute)
    {
        return $this->model->create($attribute);
    }

    public function update($id, array $attribute)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->update($attribute);
            return $result;
        }
    }

    public function delete($id)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->delete();
            return $result;
        }
    }
}

<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    protected Request $request;

    protected array $defaultAttributesToExcept = ['_token', '_method'];

    protected bool $exceptDefaultAttributes = true;

    /**
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        if ($this->model) {
            $this->model = app()->make($this->model);
        }
        $this->setRequest(\request());
    }

    public function setRequest(Request $request): BaseRepository
    {
        $this->request = $request;
        return $this;
    }

    public function createOrUpdateMultipleFromRequest(array $attributesToAddOrReplace, array $attributeToExcept, bool $saveMissingModelFillableAttributesToNull = true): Collection
    {
        $this->exceptAttributesFromRequest($attributeToExcept);
        $this->addOrReplaceAttributesInRequest($attributesToAddOrReplace);
        return $this->createOrUpdateMultipleFromArray($this->request->all(), $saveMissingModelFillableAttributesToNull);
    }

    public function createOrUpdateMultipleFromArray(array $data, bool $saveMissingModelFillableAttributesToNull = true): Collection
    {
        $models = new Collection();
        foreach ($data as $instanceData) {
            $models->push($this->createOrUpdateFromArray($instanceData, $saveMissingModelFillableAttributesToNull));
        }
        return $models;
    }

    public function createOrUpdateFromArray(array $data, bool $saveMissingModelFillableAttributesToNull = true): Model
    {
        $primary = $this->getModelPrimaryFromArray($data);
        return $primary
            ? $this->updateByPrimary($primary, $data, $saveMissingModelFillableAttributesToNull)
            : $this->getModel()->create($data);
    }

    public function createOrUpdateFromRequest(array $attributesToAddOrReplace = [], array $attributesToExcept = [], bool $saveMissingModelFillableAttributesToNull = true): Model
    {
        $this->exceptAttributesFromRequest($attributesToExcept);
        $this->addOrReplaceAttributesInRequest($attributesToAddOrReplace);

        return $this->createOrUpdateFromArray($this->request->all(), $saveMissingModelFillableAttributesToNull);
    }

    public function updateByPrimary(string $primary, array $data, bool $saveMissingModelFillableAttributesToNull = true): Model
    {
        $instance = $this->getModel()->findOrFail($primary);
        $data = $saveMissingModelFillableAttributesToNull ? $this->setMissingFillableAttributesToNull($data) : $data;
        $instance->update($data);

        return $instance;
    }

    public function deleteFromRequest(array $attributesToAddOrReplace = [], array $attributesToExcept = []): bool
    {
        $this->exceptAttributesFromRequest($attributesToExcept);
        $this->addOrReplaceAttributesInRequest($attributesToAddOrReplace);

        return $this->deleteFromArray($this->request->all());
    }

    public function deleteFromArray(array $data): bool
    {
        $primary = $this->getModelPrimaryFromArray($data);

        return $this->getModel()->findOrFail($primary)->delete();
    }

    public function deleteByPrimary(string $primary)
    {
        return $this->getModel()->findOrFail($primary)->delete();
    }

    public function deleteMultipleFromPrimaries(array $instancePrimaries): int
    {
        return $this->getModel()->destroy($instancePrimaries);
    }

    public function paginateArrayResults(array $data, int $perPage = 20): LengthAwarePaginator
    {
        $page = $this->request->input('page', 1);
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($data, $offset, $perPage, false),
            count($data),
            $perPage,
            $page,
            [
                'page' => $this->request->url(),
                'query' => $this->request->query()
            ]
        );
    }

    public function findOneByPrimary(string $primary, bool $throwExceptionIfNotFound = true)
    {
        return $throwExceptionIfNotFound
            ? $this->getModel()->findOrFail($primary)
            : $this->getModel()->find($primary);
    }

    public function findOneFromArray(array $data, bool $throwExceptionIfNotFound = true)
    {
        return $throwExceptionIfNotFound
            ? $this->getModel()->where($data)->firstOrFail()
            : $this->getModel()->where($data)->first();
    }

    public function findMultipleFromArray(array $data): Collection
    {
        return $this->getModel()->where($data)->get();
    }

    public function findAll(array $column = ['*'], string $orderBy = 'default', string $orderByDirection = 'asc'): Collection
    {
        $orderBy = $orderBy === 'default' ? $this->getModel()->getKeyName() : $orderBy;

        return $this->getModel()->orderBy($orderBy, $orderByDirection)->get($column);
    }

    public function make(array $data): Model
    {
        return app($this->getModel()->getMorphClass())->fill($data);
    }

    public function modelUniqueInstance(): Model
    {
        $modelInstance = $this->getModel()->first();
        if (! $modelInstance) {
            $modelInstance = $this->getModel()->create([]);
        }

        return $modelInstance;
    }

    public function setMissingFillableAttributesToNull(array $data): array
    {
        $fillableAttributes = $this->getModel()->getFillable();
        $dataWithMissingAttributesToNull = [];
        foreach ($fillableAttributes as $fillableAttribute) {
            $dataWithMissingAttributesToNull[$fillableAttribute] =
                $data[$fillableAttribute] ?? null;
        }

        return $dataWithMissingAttributesToNull;
    }

    public function findMultipleFromPrimaries(array $primaries): Collection
    {
        return $this->getModel()->findMany($primaries);
    }

    protected function exceptAttributesFromRequest(array $attributeToExcept = [])
    {
        if ($this->exceptDefaultAttributes) {
            $attributeToExcept = array_merge($this->defaultAttributesToExcept, $attributeToExcept);
        }
        $this->request->replace($this->request->except($attributeToExcept));
    }

    protected function addOrReplaceAttributesInRequest(array $attributesToAddOrReplace)
    {
        $attributesToAddOrReplaceArray = [];
        foreach ($attributesToAddOrReplace as $key => $value) {
            $attributesToAddOrReplaceArray[$key] = $value;
        }
        $newRequestAttributes = array_replace_recursive($this->request->all(), $attributesToAddOrReplaceArray);
        $this->request->replace($newRequestAttributes);
    }

    protected function getModelPrimaryFromArray(array $data)
    {
        return array_key_exists($this->getModel()->getKeyName(), $data)
            ? $data[$this->getModel()->getKeyName()]
            : null;
    }

    protected function getModel(): Model
    {
        if ($this->model instanceof Model) {
            return $this->model;
        }
        throw new ModelNotFoundException(
            'You must declare your repository $model attribute with an Illuminate\Database\Eloquent\Model '
            . 'namespace to use this feature.'
        );
    }
}

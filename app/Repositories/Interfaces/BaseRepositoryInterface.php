<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function setModel(string $modelClass);

    public function setRequest(Request $request);

    public function createOrUpdateMultipleFromRequest(
        array $attributesToAddOrReplace,
        array $attributeToExcept,
        bool $saveMissingModelFillableAttributesToNull = true
    ): Collection;

    public function createOrUpdateMultipleFromArray(
        array $data,
        bool $saveMissingModelFillableAttributesToNull = true
    ): Collection;

    public function createOrUpdateFromArray(array $data, bool $saveMissingModelFillableAttributesToNull = true): Model;

    public function createOrUpdateFromRequest(
        array $attributesToAddOrReplace = [],
        array $attributesToExcept = [],
        bool $saveMissingModelFillableAttributesToNull = true
    ): Model;

    public function updateByPrimary(
        string $primary,
        array $data,
        bool $saveMissingModelFillableAttributesToNull = true
    ): Model;

    public function deleteFromRequest(array $attributesToAddOrReplace = [], array $attributesToExcept = []);

    public function deleteFromArray(array $data): bool;

    public function deleteByPrimary(string $primary);

    public function deleteMultipleFromPrimaries(array $instancePrimaries): int;

    public function paginateArrayResults(array $data, int $perPage = 20): LengthAwarePaginator;

    public function findOneByPrimary(string $primary, bool $throwExceptionIfNotFound = true);

    public function findOneFromArray(array $data, bool $throwExceptionIfNotFound = true);

    public function findMultipleFromArray(array $data): Collection;

    public function findAll(array $column = ['*'], string $orderBy = 'default', string $orderByDirection = 'asc'): Collection;

    public function make(array $data): Model;

    public function modelUniqueInstance(): Model;

    public function setMissingFillableAttributesToNull(array $data): array;

    public function findMultipleFromPrimaries(array $primaries): Collection;
}

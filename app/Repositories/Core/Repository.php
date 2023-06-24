<?php

namespace App\Repositories\Core;

use Illuminate\Support\Facades\Storage;

class Repository
{
    /**
     * Model::class
     */
    public $model;

    /**
     * @var array
     */
    public $filters = [];

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->model::all();
    }

    /**
     * @return mixed
     */
    public function findBy(string $column, $value)
    {
        return $this->model::where($column, $value);
    }

    /**
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model::create($data)->fresh();
    }

    /**
     * @return mixed
     */
    public function insert(array $data)
    {
        return $this->model::insert($data);
    }

    /**
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        $item = $this->findById($id);
        $item->fill($data);
        $item->save();

        return $item->fresh();
    }

    /**
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->model::find($id);
    }

    /**
     * @return mixed|void
     */
    public function delete(int $id)
    {
        $this->model::destroy($id);
    }

    /**
     * @return mixed
     */
    public function restore(int $id)
    {
        $object = $this->findByIdWithTrashed($id);
        if ($object && method_exists($this->model, 'softDeleted')) {
            $object->restore($id);

            return $object;
        }
    }

    /**
     * @return mixed
     */
    public function findByIdWithTrashed(int $id)
    {
        if (method_exists($this->model, 'softDeleted')) {
            return $this->model::withTrashed()->find($id);
        }
    }

    /**
     * @return mixed
     */
    public function restoreAll(array $ids)
    {
        if (method_exists($this->model, 'softDeleted')) {
            $noOfRecord = $this->model::whereIn('id', $ids)->withTrashed()->restore();

            if ($noOfRecord) {
                return true;
            }
        }
    }

    /**
     * @param  mixed  $path
     * @param  mixed  $file
     */
    public function storeFile($path, $file): bool
    {
        return Storage::put($path, $file);
    }

    /**
     * @param  mixed  $path
     */
    public function getFile($path): string
    {
        return Storage::get($path);
    }
}
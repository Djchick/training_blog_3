<?php 

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Exception;
use App\Models\Entry;
use App\Repositories\Entry\EntryRepositoryInterface;

class EntryRepository extends BaseRepository implements EntryRepositoryInterface {

    protected $model;

    public function __construct(Entry $entry)
    {
        $this->model = $entry;
    }

    public function create($data) {
        return $this->model->create($data);
    }

    public function lists($column_name, $id) {
        return $this->model->lists($column_name, $id);
    }

    public function update($data, $id) {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id) {
        return $this->model->destroy($id);
    }
}
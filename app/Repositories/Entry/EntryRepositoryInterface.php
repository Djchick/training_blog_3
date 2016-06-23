<?php

namespace App\Repositories\Entry;

interface EntryRepositoryInterface
{
    public function all($columns = ['*']);
    public function find($id, $columns = ['*']);
    public function update($data, $id);
    public function delete($id);
}
<?php

namespace App\Repositories;

use App\Models\Notebook;
use App\Repositories\Interfaces\INotebookRepository;

class NotebookRepository implements INotebookRepository
{
    public function paginate(int $limit)
    {
        return Notebook::query()->paginate($limit);
    }

    public function create(array $data)
    {
        return Notebook::query()->create($data);
    }

    public function firstOrfail(int $id)
    {
        return Notebook::query()->where('id', $id)->firstOrFail();
    }

    public function delete(Notebook $notebook)
    {
        $notebook->delete();
    }
}

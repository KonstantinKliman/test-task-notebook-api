<?php

namespace App\Repositories\Interfaces;

use App\Models\Notebook;

interface INotebookRepository
{
    public function paginate(int $limit);

    public function create(array $data);

    public function firstOrfail(int $id);

    public function delete(Notebook $notebook);
}

<?php

namespace App\Services\Interfaces;

use App\Http\Requests\Api\v1\Notebook\CreateRequest;
use App\Http\Requests\Api\v1\Notebook\UpdateRequest;
use Illuminate\Http\Request;

interface INotebookService
{

    public function all(Request $request);

    public function store(CreateRequest $request);

    public function getById(int $id);

    public function update(UpdateRequest $request, int $id);

    public function delete(int $id);

}

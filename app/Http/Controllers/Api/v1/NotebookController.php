<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Notebook\CreateRequest;
use App\Http\Requests\Api\v1\Notebook\UpdateRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use App\Services\Interfaces\INotebookService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotebookController extends Controller
{
    private INotebookService $service;

    public function __construct(INotebookService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->service->all($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $this->service->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $this->service->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $this->service->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
    }
}

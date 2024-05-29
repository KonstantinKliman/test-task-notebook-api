<?php

namespace App\Services;

use App\Exceptions\BadRequestException;
use App\Http\Requests\Api\v1\Notebook\CreateRequest;
use App\Http\Requests\Api\v1\Notebook\UpdateRequest;
use App\Http\Resources\NotebookResource;
use App\Repositories\Interfaces\INotebookRepository;
use App\Services\Interfaces\INotebookService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NotebookService implements INotebookService
{
    private INotebookRepository $repository;

    public function __construct(INotebookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(Request $request)
    {
        if (!is_int($request->query('limit'))) {
            throw new BadRequestException();
        }
        $notebooks = $this->repository->paginate($request->query('limit'));
        return NotebookResource::collection($notebooks);
    }

    public function store(CreateRequest $request)
    {
        $data = array_filter([
            'full_name' => $request->validated('fullName'),
            'company' => $request->validated('company'),
            'phone' => $request->validated('phone'),
            'email' => $request->validated('email'),
            'date_of_birth' => $request->validated('dateOfBirth'),
        ]);

        if ($request->hasFile('photoUrl')) {
            $data['photo_url'] = config('app.url') . '/storage/' .$request->file('photoUrl')->store('uploads');
        }

        $notebook = $this->repository->create($data);

        return new NotebookResource($notebook);
    }

    public function getById(int $id)
    {
        try {
            $notebook = $this->repository->firstOrfail($id);
            return new NotebookResource($notebook);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function update(UpdateRequest $request, int $id)
    {
        $data = array_filter([
            'full_name' => $request->validated('fullName'),
            'company' => $request->validated('company'),
            'phone' => $request->validated('phone'),
            'email' => $request->validated('email'),
            'date_of_birth' => $request->validated('dateOfBirth'),
        ]);

        try {
            $notebook = $this->repository->firstOrfail($id);
            if ($request->hasFile('photoUrl')) {
                if ($notebook->photo_url) {
                    Storage::delete($notebook->photo_url);
                }
                $data['photo_url'] = config('app.url') . '/storage/' .$request->file('photoUrl')->store('uploads');
            }
            $notebook->update($data);
            return new NotebookResource($notebook);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function delete(int $id)
    {
        try {
            $notebook = $this->repository->firstOrfail($id);
            if ($notebook->photo_url) {
                Storage::delete(Str::replace(config('app.url') . '/storage', '', $notebook->photo_url));
            }
            $this->repository->delete($notebook);
            return response()->json(['message' => 'Record successfully deleted'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}

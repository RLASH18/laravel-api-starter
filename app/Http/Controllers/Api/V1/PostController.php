<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use App\Traits\ApiResponse;

class PostController extends Controller
{
    use ApiResponse;

    /**
     * Inject the PostService dependency.
     *
     * @param PostService
     */
    public function __construct(
        protected PostService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->service->allPost();

        return $this->success(PostResource::collection($posts));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = $this->service->createPost($request->validated());

        return $this->created(new PostResource($post), 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $post = $this->service->showPost($id);

        if (! $post) {
            return $this->notFound('Post not found');
        }

        return $this->success(new PostResource($post));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, int $id)
    {
        $updated = $this->service->updatePost($id, $request->validated());

        if (! $updated) {
            return $this->notFound('Post not found');
        }

        return $this->success(new PostResource($updated), 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $deleted = $this->service->deletePost($id);

        if (! $deleted) {
            return $this->notFound('Post not found');
        }

        return $this->deleted('Post deleted successfully');
    }
}

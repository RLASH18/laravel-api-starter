<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /**
     * Retrieve all posts from the database.
     *
     * @return Collection|Post[]
     */
    public function allPost(): Collection
    {
        return Post::all();
    }

    /**
     * Create a new post.
     *
     * @param array $data
     * @return Post
     */
    public function createPost(array $data): Post
    {
        return Post::create($data);
    }

    /**
     * Get a post by ID.
     *
     * @param int $id
     * @return Post|null
     */
    public function showPost(int $id): ?Post
    {
        return Post::find($id);
    }

    /**
     * Update a post.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updatePost(int $id, array $data): ?Post
    {
        $post = Post::find($id);

        if (! $post) {
            return null;
        }

        $post->update($data);

        return $post;
    }

    /**
     * Delete a post.
     *
     * @param int $id
     * @return bool
     */
    public function deletePost(int $id): bool
    {
        $post = Post::find($id);

        if (! $post) {
            return false;
        }

        return $post->delete();
    }
}

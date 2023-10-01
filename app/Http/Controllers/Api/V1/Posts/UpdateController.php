<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Domain\Blogging\Models\Post;
use Domain\Blogging\Factories\PostFactory;
use App\Http\Requests\Api\V1\Posts\UpdateRequest;
use JustSteveKing\StatusCode\Http;
use App\Jobs\Posts\UpdatePost;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post) : Response
    {
        UpdatePost::dispatch(
            PostFactory::createToUpdatePost(
                attributes: $request->validated(),
                post: $post
            ),
            post: $post
        );

        return response(
            content: null,
            status: Http::ACCEPTED
        );
    }
}

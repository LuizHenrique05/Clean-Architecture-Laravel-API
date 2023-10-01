<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use JustSteveKing\StatusCode\Http;
use Domain\Blogging\Actions\CreatePost;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) : jsonResponse
    {
        $post = CreatePost::handle(
            object: PostFactory::create(
                attributes: $request->validated()
            )
        );

        return response()->json(
            data: $post,
            status: Http::CREATED
        );
    }
}

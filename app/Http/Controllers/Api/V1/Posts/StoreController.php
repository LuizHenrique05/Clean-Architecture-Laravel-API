<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use JustSteveKing\StatusCode\Http;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\Response;
use Domain\Blogging\Jobs\CreatePost;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) : Response
    {
        CreatePost::dispatch(
            PostFactory::createToStorePost(
                attributes: $request->validated()
            )
        );

        return response(
            content: null,
            status: Http::ACCEPTED
        );
    }
}

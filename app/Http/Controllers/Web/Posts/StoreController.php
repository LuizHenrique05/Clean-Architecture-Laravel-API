<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\RedirectResponse;
use Domain\Blogging\Jobs\CreatePost;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) : RedirectResponse
    {
        CreatePost::dispatch(
            PostFactory::createToStorePost(
                attributes: $request->validated()
            )
        );

        return redirect()->route('home');
    }
}

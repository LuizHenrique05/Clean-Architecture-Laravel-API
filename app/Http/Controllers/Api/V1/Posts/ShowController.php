<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Blogging\Models\Post;
use App\Http\Resources\Api\V1\PostResource;
use Spatie\QueryBuilder\QueryBuilder;
use JustSteveKing\StatusCode\Http;
use Infrastructure\Http\Responses\ApiResponse;

class ShowController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $postQueryReturn = QueryBuilder::for(
            Post::where('id', $post->id)
        )->allowedIncludes(
            includes: ['user']
        )->first();

        return ApiResponse::handle(
            data: new PostResource(
                resource: $postQueryReturn,
            ),
            status: Http::OK
        );
    }
}

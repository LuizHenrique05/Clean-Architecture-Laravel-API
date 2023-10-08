<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Response;
use App\Http\Resources\Api\V1\PostResource;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use JustSteveKing\StatusCode\Http;

class ShowController extends Controller
{
    public function __invoke(Request $request, Post $post) : jsonResponse
    {
        $post = QueryBuilder::for(
            subject: Post::class,
        )->allowedIncludes(
            includes: ['user']
        )->first();

        return response()->json(
            data: new PostResource(
                resource: $post,
            ),
            status: Http::OK
        );
    }
}

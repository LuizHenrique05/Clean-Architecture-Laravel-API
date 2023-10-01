<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\PostResource;
use Domain\Blogging\Models\Post;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    public function __invoke(Request $request) : jsonResponse
    {
        $posts = QueryBuilder::for(
            subject: Post::class,
        )->allowedIncludes(
            includes: ['user']
        )->published()->paginate(3);

        return response()->json(
            data: PostResource::collection(
                resource: $posts,
            ),
            status: Http::OK
        );
    }
}

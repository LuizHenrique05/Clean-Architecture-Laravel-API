<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\PostResource;
use Domain\Blogging\Models\Post;
use JustSteveKing\StatusCode\Http;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Infrastructure\Http\Responses\ApiResponse;

class IndexController extends Controller
{
    public function __invoke(Request $request) : ApiResponse
    {
        $posts = QueryBuilder::for(
            subject: Post::class,
        )->allowedIncludes(
            includes: ['user']
        )->allowedFilters([
            AllowedFilter::scope('published'),
            AllowedFilter::scope('draft')
        ])->paginate();

        return ApiResponse::handle(
            data: PostResource::collection(
                resource: $posts,
            ),
            status: Http::OK
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\PostResource;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return PostResource::collection(Post::all());
    }
}

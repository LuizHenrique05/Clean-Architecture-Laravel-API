<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;
use Domain\Blogging\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Request $request, Post $post) : Response
    {
        $post->delete();
        
        return response(
            content: null,
            status: Http::ACCEPTED
        );
    }
}

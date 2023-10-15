<?php

use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertNotNull;
use Domain\Blogging\Models\Post;
use Illuminate\Testing\Fluent\AssertableJson;
use Domain\Shared\Models\User;

beforeEach(fn() => $this->post = Post::factory()->create());

it('test index route for posts', function () {
    get(route('api:v1:posts:index'))
        ->assertStatus(Http::OK)
        ->assertJson(function (AssertableJson $json) {
            $json->has(1)
                ->first(function (AssertableJson $json) {
                    $json->where('id', $this->post->key)
                        ->where('attributes.title', $this->post->title)
                        ->etc();
                });
        });
});

it('test create route for posts', function () {
    User::factory()->create();

    post(route('api:v1:posts:store'), 
        [
            'title' => 'test title',
            'description' => 'description',
            'body' => 'test body',
        ])
        ->assertNoContent(status: Http::ACCEPTED);
});

it('test show route for posts', function () {
    get(route('api:v1:posts:show', $this->post->key))
        ->assertStatus(Http::OK)
        ->assertJson(function (AssertableJson $json) {
            $json->where('id', $this->post->key)    
                ->where('attributes.title', $this->post->title)
                ->missing('relationship.user')
                ->etc();
        });;
});

it('test show route for posts with user information', function () {
    get("/api/v1/posts/{$this->post->key}?include=user")
        ->assertStatus(Http::OK)
        ->assertJson(function (AssertableJson $json) {
            $json->where('id', $this->post->key)    
                ->where('attributes.title', $this->post->title)
                ->has('relationships')
                ->where('relationships.user', null)
                ->etc();
        });
});

it('test update route for posts', function () {
    $newTitle = 'test title updated';

    expect($this->post)->title->toBe($this->post->title);

    User::factory()->create();

    patch(route('api:v1:posts:update', $this->post->key), array_merge(
            $this->post->toArray(),
            [
                'title' => $newTitle
            ]
        ))
        ->assertNoContent(status: Http::ACCEPTED);

    $this->post->refresh();

    expect($this->post)->title->toBe($newTitle);
});

it('test delete route for posts', function () {
    User::factory()->create();
    assertDatabaseHas('posts', [
        'id' => $this->post->id,
        'title' => $this->post->title,
    ]);

    assertNull($this->post->deleted_at);

    delete(route('api:v1:posts:delete', $this->post->key))
        ->assertNoContent(status: Http::ACCEPTED);

    $this->post->refresh();

    assertNotNull($this->post->deleted_at);
});
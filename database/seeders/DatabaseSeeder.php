<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Blogging\Models\Post;
use Domain\Shared\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        // if(app()->environment('local')) {
        //     $this->call(
        //         class: DefaultUserSeeder::class,
        //     );
        // }

        Post::factory(20)->for(
            User::factory()->create([
                'first_name' => 'Luiz',
                'last_name' => 'Simba',
                'email' => 'luiz.simba@gmail.com'
            ])
        )->create();
    }
}

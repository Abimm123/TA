<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Abimanyu',
            'username' => 'Abim',
            'email' => 'prakbim1105@gmail.com',
            'password' => bcrypt('Abimanyu123_')
        ]);

        // User::create([
        //     'name' => 'Fio',
        //     'email' => 'fiodhy0101@gmail.com',
        //     'password' => bcrypt('Fiodhy123_')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Progamming',
            'slug' => 'web-progamming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit, iusto ducimus esse dolore similique, quia accusamus doloribus consequuntur quidem. Corporis aut facere expedita amet neque porro fugit voluptates ab odio magnam nesciunt quo suscipit, quia aspernatur officia veniam unde impedit, consectetur dolores delectus iusto ipsum sunt? Quasi sit illo hic accusamus delectus. Tempora minus in delectus culpa sed fugiat voluptatibus quibusdam vero suscipit eius sequi alias necessitatibus dolorum, doloribus inventore expedita possimus? Voluptas enim neque labore animi molestias aspernatur quo.',
        //     'category_id' => '1',
        //     'user_id' => '1'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit, iusto ducimus esse dolore similique, quia accusamus doloribus consequuntur quidem. Corporis aut facere expedita amet neque porro fugit voluptates ab odio magnam nesciunt quo suscipit, quia aspernatur officia veniam unde impedit, consectetur dolores delectus iusto ipsum sunt? Quasi sit illo hic accusamus delectus. Tempora minus in delectus culpa sed fugiat voluptatibus quibusdam vero suscipit eius sequi alias necessitatibus dolorum, doloribus inventore expedita possimus? Voluptas enim neque labore animi molestias aspernatur quo.',
        //     'category_id' => '2',
        //     'user_id' => '1'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit, iusto ducimus esse dolore similique, quia accusamus doloribus consequuntur quidem. Corporis aut facere expedita amet neque porro fugit voluptates ab odio magnam nesciunt quo suscipit, quia aspernatur officia veniam unde impedit, consectetur dolores delectus iusto ipsum sunt? Quasi sit illo hic accusamus delectus. Tempora minus in delectus culpa sed fugiat voluptatibus quibusdam vero suscipit eius sequi alias necessitatibus dolorum, doloribus inventore expedita possimus? Voluptas enim neque labore animi molestias aspernatur quo.',
        //     'category_id' => '1',
        //     'user_id' => '2'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga tenetur sapiente earum expedita ipsa maxime totam veritatis vitae eum distinctio. Possimus unde sunt nobis, nemo dicta aperiam nam suscipit, iusto ducimus esse dolore similique, quia accusamus doloribus consequuntur quidem. Corporis aut facere expedita amet neque porro fugit voluptates ab odio magnam nesciunt quo suscipit, quia aspernatur officia veniam unde impedit, consectetur dolores delectus iusto ipsum sunt? Quasi sit illo hic accusamus delectus. Tempora minus in delectus culpa sed fugiat voluptatibus quibusdam vero suscipit eius sequi alias necessitatibus dolorum, doloribus inventore expedita possimus? Voluptas enim neque labore animi molestias aspernatur quo.',
        //     'category_id' => '2',
        //     'user_id' => '2'
        // ]);
    }
}

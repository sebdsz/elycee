<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create();

        $dirUpload = public_path(env('UPLOAD_PICTURES', 'uploads'));
        $files = File::allFiles($dirUpload);
        foreach ($files as $file) File::delete($file);

        foreach (App\Post::all() as $post) {
            $uri = str_random(12) . '_370x235.jpg';
            $id = rand(1, 9);
            mkdir($dirUpload . DIRECTORY_SEPARATOR . $post->id . DIRECTORY_SEPARATOR, 0700);
            $fileName = file_get_contents('http://lorempicsum.com/nemo/370/235/' . $id);
            File::put($dirUpload . DIRECTORY_SEPARATOR . $post->id . DIRECTORY_SEPARATOR . $uri, $fileName);
            $post->update([
                    'url_thumbnail' => $uri,
                ]
            );
        }
    }
}

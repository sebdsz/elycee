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
        factory(App\Post::class, 30)->create();

        $dirUpload = public_path(env('UPLOAD_PICTURES', 'uploads'));
        $files = File::allFiles($dirUpload);
        foreach ($files as $file) File::delete($file);

        foreach (App\Post::all() as $post) {

            $uri = str_random(5) . '_627x300.jpg';
            $id = rand(1, 9);

            if (is_dir($dirUpload . DIRECTORY_SEPARATOR . $post->id . DIRECTORY_SEPARATOR)) rmdir($dirUpload . DIRECTORY_SEPARATOR . $post->id . DIRECTORY_SEPARATOR);
            mkdir($dirUpload . DIRECTORY_SEPARATOR . $post->id . DIRECTORY_SEPARATOR, 0700);

            $fileName = file_get_contents('http://lorempicsum.com/nemo/627/300/' . $id);

            File::put($dirUpload . DIRECTORY_SEPARATOR . $post->id . DIRECTORY_SEPARATOR . $uri, $fileName);

            $post->update([
                'url_thumbnail' => $uri,
            ]);
        }
    }
}

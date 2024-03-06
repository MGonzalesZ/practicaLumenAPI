<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Elimina todos los registros existentes en la tabla antes de agregar nuevos datos
        DB::table('comments')->truncate();

        // Agrega datos de ejemplo
        DB::table('comments')->insert(['text' => 'Me parece muy bien', 'creation_date' => '2024-03-05', 'publishing_date' => '2024-03-05', 'published' => true, 'content_id' => 1, 'user_id' => 1]);
        DB::table('comments')->insert(['text' => 'No estoy de acuerdo', 'creation_date' => '2024-03-04', 'publishing_date' => '2024-03-04', 'published' => true, 'content_id' => 1, 'user_id' => 1]);
        DB::table('comments')->insert(['text' => 'Perfecto!', 'creation_date' => '2024-03-03', 'publishing_date' => '2024-03-03', 'published' => true, 'content_id' => 1, 'user_id' => 1]);
        DB::table('comments')->insert(['text' => 'Me parece que el titular no es el correcto', 'creation_date' => '2024-03-04', 'publishing_date' => '2024-03-04', 'published' => true, 'content_id' => 2, 'user_id' => 1]);
        DB::table('comments')->insert(['text' => 'Sí, claro. Como no!', 'creation_date' => '2024-03-05', 'publishing_date' => '2024-03-05', 'published' => true, 'content_id' => 2, 'user_id' => 1]);
        DB::table('comments')->insert(['text' => 'No estoy nada de acuerdo', 'creation_date' => '2024-03-05', 'publishing_date' => '2024-03-05', 'published' => true, 'content_id' => 2, 'user_id' => 1]);
        DB::table('comments')->insert(['text' => 'Por favor ya no publiquen temas asi', 'creation_date' => '2024-03-05', 'publishing_date' => '2024-03-05', 'published' => true, 'content_id' => 3, 'user_id' => 1]);
        DB::table('comments')->insert(['text' => 'A nadie le importa', 'creation_date' => '2024-03-05', 'publishing_date' => '2024-03-05', 'published' => true, 'content_id' => 3, 'user_id' => 1]);
    }
}

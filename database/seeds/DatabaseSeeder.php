<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'post_tag',
            'tags',
            'posts',
            'categories',
            'bouncer_assigned_roles',
            'bouncer_permissions',
            'users',
            'bouncer_abilities',
            'bouncer_roles'
        ]);

        $this->call([
            BouncerSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }

    protected function truncateTables(array $tables)
    {
        // Desactiva revisión de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        // Activa revisión de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

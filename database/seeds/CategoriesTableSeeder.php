<?php

use Illuminate\Database\Seeder;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categorie = config('database.categories');

      foreach ($categorie as $value) {
        $nuova_categoria = new Category();
        $nuova_categoria->name = $value['name'];
        $nuova_categoria->slug = Str::slug($value['slug']);
        //$nuovo_libro->fill($value);
        $nuova_categoria->save();
      }
    }
}

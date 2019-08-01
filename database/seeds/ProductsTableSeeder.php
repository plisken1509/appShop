<?php

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/
        $categories=factory(Category::class, 5)->create();
        $categories->each(function ($category) {
            $productos=factory(Product::class, 20)->make();
            $category->products()->saveMany($productos);
            //se usa save() cuando se pone una instancia de Model y en esta parte pasamos una coleccion
            $productos->each(function ($p) {
                $images=factory(ProductImage::class, 5)->make();
                $p->images()->saveMany($images);
            });
          });  

        /*$users = factory(App\User::class, 3)
           ->create()
           ->each(function ($user) {
                $user->posts()->save(factory(App\Post::class)->make());
            });*/
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.template',function($view){
             $view->with(
                 [
                     'categories' => DB::table('categories')->where('status','=',1)->get()
                 ]
            );
        });
        view()->composer('products',function($view){
            $view->with(
                [
                    'products' => DB::table('products')->where('status','=',1)->get(),
                    'categories' => DB::table('categories')->where('status','=',1)->get()
                ]
           );
       });
        view()->composer('admin.layouts.index',function($view){
            $data = DB::select(
                'SELECT DATE_FORMAT(o.created_at,"%d/%m/%Y") order_day,SUM(o.price)-p.price total_price FROM orders o,promotions p WHERE o.promotion_id = p.id and o.status = 2 GROUP BY order_day'
            );
            $view->with('data',$data);
        });
    }
}

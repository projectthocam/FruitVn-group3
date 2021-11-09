<?php

namespace App\Providers;
use App\Cart;
use Session;
use Illuminate\Support\ServiceProvider;

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
        view()->composer(['products.cart.giohang','pages.dat_hang'],function($view){
            if(Session('cart')){
                $oldcart=Session::get('cart');
                $cart=new cart($oldcart);
                $view->with(['cart'=>Session::get('cart'),
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty]);
            }
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Request;

class LaravelAppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $halaman= "";
        if(Request::segment(2) == 'item') {
          $halaman = 'item';
        }

        if(Request::segment(2) == 'order') {
          $halaman = 'order';
        }

        if(Request::segment(2) == 'akun') {
          $halaman = 'akun';
        }

        if(Request::segment(2) == 'contoh') {
          $halaman = 'contoh';
        }
        view() -> share('halaman', $halaman);
    }

    public function register()
    {
        //
    }
}

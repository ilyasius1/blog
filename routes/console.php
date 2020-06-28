<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('time1', function () {
    echo date('H:i:s d F Y');
})->describe('Display an inspiring quote');

Artisan::command('timestamp', function () {
    echo 'time ' . time();
    echo 'mktimetime ' . date('H:i:s d-m-y', mktime(1,2,3,4,5,6));

    //echo time('');
})->describe('Display an inspiring quote');

Artisan::command('lc', function () {
    $str = 'Фывапып';
    echo mb_strtolower($str);
})->describe('Display an inspiring quote');

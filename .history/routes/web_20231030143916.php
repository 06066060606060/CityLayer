<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SocialiteController;
use App\Http\Middleware\Cors;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

Route::get('/badges_overview', function () {
    return view('badges_overview');
});







Route::controller(GlobalController::class)->group(function () {
    // Route::get('/', 'getAll')->name('getAll')->middleware('App\Http\Middleware\MyMiddleware');
    Route::get('/', 'getAll')->name('default');
    Route::get('edit/{id}', 'getAll');
    Route::get('profile', 'profile')->name('profile');
    Route::get('badges_overview', 'badges_overview')->name('badges_overview');
    Route::post('save_profile', 'saveprofile')->name('saveprofile');
    Route::get('save_profile', 'profil')->name('profil');

    Route::get('preferences', 'preferences')->name('preferences');
    Route::post('save_preferences', 'savepreferences')->name('savepreferences');
    Route::post('new_preference', 'newpreference')->name('newpreference');

    Route::get('placeDetail/{id}', 'placeDetail')->name('placeDetail');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('loadMore-dashboard', 'loadMore_dashboard')->name('loadMore-dashboard');

    Route::post('/place/like', 'like')->name('like');
    Route::post('/place/dislike', 'dislike')->name('dislike');
    Route::post('/place/comment', 'comment')->name('comment');
    Route::post('edit/{id}/{type}', 'edit')->name('edit');

    Route::get('delete', 'delete')->name('delete');


    Route::post('avatar', 'avatar')->name('avatar');

    Route::get('community-achievements', 'community_achievements')->name('community-achievements');
    Route::get('/load-more-community-achievements', 'loadMore_community_achievements')->name('loadMore_community_achievements');






    Route::get('step2', function () {
        return view('step2');
    });

    Route::get('/test', function () {
        return view('test');
    });




    Route::get('impressum', function () {
        return view('impressum');
    });


    Route::get('logout', 'logout');
});
Route::post('contactmail', [MailController::class, 'sendMessage']);


Route::get('mapping', function () {
    return view('mapping');
});

Route::get('team', function () {
    return view('team');
});

Route::get('award', function () {
    return view('award');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('research', function () {
    return view('research');
});

Route::get('edit_profile', function () {
    return view('edit_profile');
});


Route::get('badges_overview', function () {
    return view('badges_overview');
});




//<-------------------------new routes---------------------------------------->

Route::get('login', function () {
    return view('login');
});

Route::get('signup/username', function () {
    return view('sign-up-u');
});
Route::get('signup/email', function () {
    return view('sign-up-e');
});

Route::get('add-new/{type?}/{id?}', [GlobalController::class, 'createNew'])->where('type', 'place|observation');;
Route::get('badges_overview', [GlobalController::class, 'badges_overview']);

Route::get('filter', [GlobalController::class, 'filter']);
Route::get('truncate', [GlobalController::class, 'truncate']);

Route::post('map/add/place', [GlobalController::class, 'addMapPlace'])->name('map.add.place');

Route::post('add/new/place', [GlobalController::class, 'addNewPlace'])->name('add.new.place');


Route::post('/save-des', [GlobalController::class, 'saveDes']);
Route::post('/save-comment', [GlobalController::class, 'saveComment']);
Route::post('/set-like', [GlobalController::class, 'setLike']);

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');


Route::post('/auth/signup', [AuthController::class, 'signup'])->name('auth.register');
Route::post('/auth/signup/username', [AuthController::class, 'signupUsername'])->name('auth.register.username');

Route::get('/signup/later', [AuthController::class, 'signuplater']);


Route::post('contactmail', [MailController::class, 'sendMessage']);

// La redirection vers le provider
Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

URL::forceScheme('http');





// static pages
Route::get('about-us', function () {
    return view('aboutus');
});

Route::get('contact-us', function () {
    return view('contactus');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/impressum-accessibility', function () {
    return view('impressum');
});

var_dump(env('APP_ENV'));
die();
if(env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

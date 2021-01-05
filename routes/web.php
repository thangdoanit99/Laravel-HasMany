<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-user', function () {
    User::create(['name' => 'user1', 'email' => 'user1@gmail.com', 'password' => bcrypt('user1@gmail.com')]);
    echo 'Add User Success!';
});

Route::get('/create-post', function () {
    User::findOrFail(1)->posts()->save(new Post(['title' => 'title2', 'body' => 'body2']));
    echo 'Add Post Success!';
});

Route::get('/read', function () {
    $posts = User::findOrFail(1)->posts;

    foreach ($posts as $post) {
        echo $post->title . '<br/>';
    }
    echo 'Read Posts Success!';
});

Route::get('/update', function () {
    User::findOrFail(1)->posts()->where('id', 1)->update(['title' => 'update_title1', 'body' => 'update_body1']);
    echo 'Update Posts Success!';
});

Route::get('/update', function () {
    User::findOrFail(1)->posts()->where('id', 1)->delete();
    echo 'Update Posts Success!';
});
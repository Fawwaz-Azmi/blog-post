<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $posts = \App\Models\Post::orderBy("created_at","desc")->paginate(20);

    return view("home", compact("posts"));
});

Route::get("/articles/{post}", function (\App\Models\Post $post) {
    $posts = \App\Models\Post::orderBy("created_at","desc")->paginate(20);

    return view("articles", compact("post"));
})->name('article.show');

Route::middleware([
    "auth:sanctum",
    config("jetstream.auth_session"),
    "verified",
])->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })->name("dashboard");

});
Route::resource("/post", PostController::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticateController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TypeReactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\CommentController;
//use App\Http\Controllers\ImageController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\EmailVerificationController;


Route::post('register', [AutenticateController::class, 'register']);
Route::post('login', [AutenticateController::class, 'login']);

Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::post('logout', [AutenticateController::class, 'logout'])->middleware('auth:sanctum');

// Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
Route::post('verify-email', [EmailVerificationController::class, 'verify'])->middleware('auth:sanctum');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    //Users
    //Route::apiResource('user', UserController::class);
    // Route::get('users', [UserController::class, 'index']);
    // Route::post('user', [UserController::class, 'store']);
    Route::get('user/{user}', [UserController::class, 'show']);
    Route::post('user/{user}', [UserController::class, 'update']);
    Route::delete('user/{user}', [UserController::class, 'destroy']);

    //Notes
    //Route::apiResource('note', NoteController::class);
    Route::get('notes', [NoteController::class, 'index']);
    Route::post('note', [NoteController::class, 'store']);
    Route::get('note/{note}', [NoteController::class, 'show']);
    Route::delete('note/{note}', [NoteController::class, 'destroy']);
    Route::post('note/{note}', [NoteController::class, 'update']);
    //Route::get('note/{note}/image', [NoteController::class, 'image']);
    Route::get('note_user', [NoteController::class, 'noteUser']);

    //Comments
    Route::apiResource('comment', CommentController::class);
    // Route::get('comments', [CommentController::class, 'index']);
    // Route::post('comment', [CommentController::class, 'store']);
    // Route::get('comment/{comment}', [CommentController::class, 'show']);
    // Route::put('comment/{comment}', [CommentController::class, 'update']);
    // Route::delete('comment/{comment}', [CommentController::class, 'destroy']);

    Route::get('comment_user', [CommentController::class, 'commentUser']);
    Route::get('comment_nota/{nota}', [CommentController::class, 'commentNote']);

    //Reactions
    Route::apiResource('reaction', ReactionController::class);
    // Route::get('reactions', [ReactionController::class, 'index']);
    Route::post('reaction-note', [ReactionController::class, 'storeNote']);
    Route::post('reaction-comment', [ReactionController::class, 'storeComment']);
    // Route::get('reaction/{reaction}', [ReactionController::class, 'show']);
    // Route::put('reaction/{reaction}', [ReactionController::class, 'update']);
    // Route::delete('reaction/{reaction}', [ReactionController::class, 'destroy']);

    Route::get('reaction_user', [ReactionController::class, 'reactionUser']);
    Route::get('reaction_nota/{nota}', [ReactionController::class, 'reactionNote']);

    //TypeReactions
    Route::apiResource('typereaction', TypeReactionController::class);
    // Route::get('typereactions', [TypeReactionController::class, 'index']);
    Route::post('typereaction', [TypeReactionController::class, 'store']);
    // Route::get('typereaction/{typereaction}', [TypeReactionController::class, 'show']);
    // Route::put('typereaction/{typereaction}', [TypeReactionController::class, 'update']);
    // Route::delete('typereaction/{typereaction}', [TypeReactionController::class, 'destroy']);
});




Route::get('prueba', function(){

});

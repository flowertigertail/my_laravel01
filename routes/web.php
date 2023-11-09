<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Profile\AvatarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

    // fetch all users
    // $users = DB::select("select * from users");
    // $users = DB::table("users")->get();
    // $users = DB::table('users')->get();
    // $users = User::where('id', 1)->first();
    // $users = User::all();
    // $users = DB::select("select * from users where email=?", ['user1@gmail.com']);

    // create new user
    // $users = DB::insert('insert into users (name, email, password) values (?,?,?)', [
    //     'user3',
    //     'user3@gmail.com',
    //     '1234qwer',
    // ]);

    // dd($users->name);
    // foreach ($users as $user) {
    //     echo $user->name;
    //     echo "<br />";
    // }
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Game;
use Illuminate\Http\Request;



// Show pages
Route::get('/login', fn() => view('login'))->name('login.page');
Route::get('/register', fn() => view('register'))->name('register.page');

// Form actions (internal call to API)


Route::post('/login', function (Request $request) {
    $controller = new AuthController();
    $response = $controller->login($request);

    if ($response->getStatusCode() === 201) {
        $data = json_decode($response->getContent(), true);
        session(['token' => $data['token']]);
        return redirect('/');
    } else {
        return back()->with('error', 'Invalid credentials');
    }
})->name('login.user');


Route::post('/register', function (Request $request) {
    $controller = new AuthController();
    $response = $controller->register($request);

    if ($response->getStatusCode() === 201) {
        $data = json_decode($response->getContent(), true);
        session(['token' => $data['token']]);
        return redirect('/');
    } else {
        return back()->withErrors(['Something went wrong']);
    }
})->name('register.user');
Route::get('/your-post', function () {
    if (!session('token')) {
        return redirect()->route('register.page');
    }

    return view('your-post'); // your-post.blade.php
});


Route::get('/', fn() => view('welcome'));
// Route::get('/', function () {
   
//     return view('welcome');
// });
Route::get('/about', function () {
   
    return view('about');
});
Route::get('/your-post', function () {
   
    return view('yourPost');
});
Route::get('/create', function () {
   
    return view('createGame');
});

Route::get('/games/{id}', function ($id) {
    $game = Game::with(['developer', 'publisher', 'platforms', 'sections'])->findOrFail($id);
    return view('detail', compact('game'));
})->name('games.show');
Route::post('/logout', function () {
    session()->forget('token');
    return redirect('/');
})->name('logout');



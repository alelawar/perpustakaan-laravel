<?php

use App\Models\Category;
use App\Models\DataBuku;
use App\Models\DataPeminjam;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    // Ambil 7 buku terlaris
    $terlaris = DataBuku::select('judul', 'slug', 'pembuat','cover' ,'deskripsi')->take(7)->get();

    // Ambil 1 data pertama dari hasil $terlaris
    $main = $terlaris->first();

    // Ambil 2 data setelah data pertama dari hasil $terlaris
    $second = $terlaris->slice(1, 2);

    // Ambil 7 data favorit secara random, tetapi tidak termasuk buku yang ada di $terlaris
    $favorites = DataBuku::take(7)->latest()->get();
    $title = 'Home page';

    return view(
        'index',
        compact('terlaris', 'main', 'second', 'favorites', 'title')
    );
});

Route::get('/search', function () {
    $books = DataBuku::select('judul', 'slug', 'pembuat', 'cover');

    if (request('s')) {
        $books->where('judul', 'like', '%' . request('s') . '%')->orWhere('pembuat', 'like', '%' . request('s') . '%');
    }

    return view('search', [
        'books' => $books->paginate(14),
        "title" => 'Cari buku'
    ]);
});

Route::get('/terlaris', function() {
   return view('terlaris', [
    'title' => 'terlaris',
    'terlaris' => DataBuku::inRandomOrder()->paginate(14)
   ]);
} );

Route::get('/terbaru', function() {
   return view('terbaru', [
    'title' => 'Buku terbaru',
    'terbaru' => DataBuku::latest()->paginate(14)
   ]);
} );

Route::get('/favorit', function() {
   return view('favorit', [
    'title' => 'Buku Favorit',
    'favorit' => DataBuku::latest()->inRandomOrder()->paginate(14)
   ]);
} );
Route::get('/category/{slug}',function($slug) {
    $category = Category::where('slug', $slug)->firstOrFail();

    return view('category', [
        'books' => DataBuku::where('category_id', $category->id)->latest()->paginate(10),
        'category' => $category,
        'title' => 'Category'
    ]);
} );

Route::get('/detail/{book:slug}', function (DataBuku $book) {
    return view('detail.index', ['title' => 'Single Article', 'book' => $book]);
});


// route login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// route register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    // Rute ke profile user 
    Route::get('/profile', function() {
        return view('user.profile', [
            'title' => 'Profile',
            "pinjaman" => DataPeminjam::with('buku')->where('user_id', auth()->user()->id)->latest()->get()
        ]);
    });

    Route::get('/profile/detail/{token}', function($token) {
       return view('user.detail', [
        'title' => 'Detail Pinjaman', 
        'pinjaman' => DataPeminjam::where('token', $token)->first()
       ]);
        
    });

    
    // RESOURCE GET CATEGORY
    Route::get('/category/books/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::resource('/category', CategoryController::class);
    
    // RESOURCE CONTROLLER
    Route::get('/dashboard/books/checkSlug', [AdminController::class, 'checkSlug']);
    Route::resource('/dashboard', AdminController::class)->parameters([
        'dashboard' => 'dataBuku' // Pastikan Laravel tahu bahwa {dashboard} harus di-bind ke DataBuku
    ]);


    // RUTE MINJAM MEMINJAM
    Route::put('/pinjam/update', [PinjamanController::class, 'pinjamanUpdate'])->name('pinjaman.pinjamanUpdate');
    Route::resource('/pinjam', PinjamanController::class)->parameters(['pinjam' => 'dataPeminjam']);
});

<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = auth()->user()->wishlist()->with('book')->get();
        $title = 'Wishlist';
        return view('user.wishlist', compact('wishlist', 'title'));
    }

    public function toggle(Request $request)
    {
        $request->validate(['book_id' => 'required|exists:data_buku,id']);

        $wishlist = Wishlist::where('user_id', auth()->id())->where('book_id', $request->book_id)->first();

        if ($wishlist) {
            $wishlist->delete();
            session()->flash('status', 'Berhasil di hapus dari wishlist');
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'book_id' => $request->book_id
            ]);
            session()->flash('status', 'Berhasil menambahkan ke wishlist');
        }

        return back();
    }

    
}

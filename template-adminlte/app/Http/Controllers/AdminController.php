<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('home', compact('user'));
    }

    public function books()
    {
        $user = Auth::user();
        $books = Book::all();

        return view('book', compact('user', 'books'));
    }

    public function submit_book(Request $request)
    {
        $book = new Book();
        $book->judul = $request->get('judul');
        $book->penulis = $request->get('penulis');
        $book->tahun = $request->get('tahun');
        $book->penerbit = $request->get('penerbit');

        if ($request->hasFile('cover')) {
            $extension = $request->file('cover')->extension();
            $filename = 'cover_buku_' . time() . '.' . $extension;
            $request->file('cover')->storeAs('public/cover_buku', $filename);
            $book->cover = $filename;
        }

        $book->save();

        $notification = array(
            'message' => 'Data buku berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    public function getDataBuku($id)
    {
        // Pengambilan buku berdasarkan id
        $buku = Book::find($id);

        // Mengembalikan buku dengan format json
        return response()->json($buku);
    }

    public function update_book(Request $req)
    {
        $book = Book::find($req->get('id'));

        $book->judul = $req->get('judul');
        $book->penulis = $req->get('penulis');
        $book->tahun = $req->get('tahun');
        $book->penerbit = $req->get('penerbit');

        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_buku_'.time().'.'.$extension;

            $req->file('cover')->storeAs(
                'public/cover_buku', $filename
            );

            Storage::delete('public/cover_buku/'.$req->get('old_cover'));
            $book->cover = $filename;
        }

        $book->save();

        $notification = array(
            'message' => 'Data berhasil dirubah',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.books')->with($notification);
    }

        public function delete_book(Request $req)
        {
            $book = Book::find($req->get('id'));
            Storage::delete('public/cover_buku/'.$req->get('old_cover'));
            $book->delete();
            $notification = array(
                'message' => 'Data buku berhasil dihapus',
                'alert-type' => 'success'
            );



        return redirect()->route('admin.books')->with($notification);


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ngambil data dari model-> menampilkan halaman
        $data['books'] = Book::with('bookshelf')->get();
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');
        return view('books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:150',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'publisher' => 'required|max:100',
            'city' => 'required|max:75',
            'bookshelf_id' => 'required',
            'cover' => 'nullable|image',
        ]);
        if($request->hasFile('cover')){
            $path = $request->file('cover')->storeAs(
            'cover_buku',
            'cover_buku_'.time() . '.' . $request->file('cover')->extension(),
            'public'
            );
            $validated['cover'] = basename($path);
        }
        Book::create($validated);

        $notification = array(
            'message' => "Data buku berhasil ditambahkan!",
            'alert-type' => 'success'
        );

        if($request->save == true){
            return redirect()->route('book')->with($notification);
        }else{
            return redirect()->route('book.create')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  
use App\Models\Book;
use App\Http\Resources\BooksResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{

    // GET /api/books
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return new BooksResource(true, 'List Data Books', $books);
    }

    // POST /api/books
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year
        ]);

        return new BooksResource(true, 'Data Book Berhasil Ditambahkan!', $book);
    }

    // GET /api/books/{id}
    public function show($id)
    {
        $book = Book::find($id);

        if(!$book){
            return response()->json([
                'message' => 'Book not found'
            ],404);
        }

        return response()->json($book);
    }

    // PUT /api/books/{id}
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if(!$book){
            return response()->json([
                'message' => 'Book not found'
            ],404);
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year
        ]);

        return response()->json([
            'message' => 'Book updated',
            'data' => $book
        ]);
    }

    // DELETE /api/books/{id}
    public function destroy($id)
    {
        $book = Book::find($id);

        if(!$book){
            return response()->json([
                'message' => 'Book not found'
            ],404);
        }

        $book->delete();

        return response()->json([
            'message' => 'Book deleted'
        ]);
    }
}
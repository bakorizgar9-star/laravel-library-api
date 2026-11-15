<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class ApiController extends Controller
{
    public function index(){
    $books = Book::all();
    return response()->json($books);

    }
    public function show($id){
     $book = Book::findOrFail($id);
     return response()->json($book);
    }
   public function store(Request $request){
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'status' => 'required|string',
    ]);

    $book = Book::create($validated);
    return response()->json($book, 201);
}
  public function update(Request $request, Book $book){
    $validated = $request->validate([
        'title' => 'sometimes|required|string|max:255',
        'author' => 'sometimes|required|string|max:255',
        'price' => 'sometimes|required|numeric|min:0',
        'stock' => 'sometimes|required|integer|min:0',
        'status' => 'sometimes|required|string',
    ]);

    $book->update($validated);
    return response()->json($book, 200);
}
    public function destroy(Book $book){
        $book->delete();
        return response()->json(null, 204);
    }
}

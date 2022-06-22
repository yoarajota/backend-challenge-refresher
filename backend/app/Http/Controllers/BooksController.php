<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Requests\StoreCadastroRequest;
use App\Http\Requests\UpdateCadastroRequest;
use Exception;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BooksController extends Controller
{

    public function index()
    {
        $books = Books::all();
        return view('welcome', ['books' => $books]);
    }

    public function store(Request $request)
    {
        try {
            $book = new Books();

            $book->title = $request->title;
            $book->author = $request->author;
            $book->release_date = $request->release_date;
            $book->rating = $request->rating;
            // $book->id = $id;

            $book->save();

            return redirect('/');
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        try {
            $book = Books::find($request->id);
            $book->title = $request->title;
            $book->author = $request->author;
            $book->release_date = $request->release_date;
            $book->rating = $request->rating;
            $book->save();

            return redirect('/');
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            Books::find($id)->delete();

            return redirect('/');

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();;
        }
    }

    public function show($id)
    {
        $bookinfo = Books::find($id);
        return view('add', ['book' => $bookinfo]);
    }
}
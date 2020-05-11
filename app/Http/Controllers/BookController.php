<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Category;
use Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // yeu cau dang nhap tren tat ca cac form

        // $this->middleware(function($request, $next){
        //     if (!Auth::check()) {
        //         return redirect()->route('login');
        //     }
        //     return $next($request);
        // });
    }

    public function dashboard()
    {
        $user = Auth::user();
        $totalBook = $user->books()->count();
        return view('book.dashboard', compact('totalBook'));
    }

    // public function index()
    // {
    //     $books = Book::all();
    //     return view('book.index', compact('books'));
    // }

    public function index(Request $request)
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }
        $keyword = $request->get('keyword');
        $query = Book::query();
        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
            $query->orWhereHas('author', function($authorSubQuery) use ($keyword){
                $authorSubQuery->where('name', 'like', "%{$keyword}%");
            });
        }
        // $books = $query->get();
        $books = $query->orderBy('id', 'desc')->paginate(3);
        return view('book.index2', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('book.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate
        $name = $request->get('name');
        $description = $request->get('description');
        $publish_at = $request->get('publish_at');
        $categories = $request->get('categories');
        $book = new Book;
        $book->name = $name;
        $book->description = $description;
        $book->publish_at = $publish_at;
        $book->author_id = 2;
        $book->user_id = Auth::id();
        $book->save();
        event(new \App\Events\CreateNewBook($book, Auth::user()));
        $book->categories()->attach($categories);
        return redirect()->route('book.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $book = Book::find($id);

        // $author = Author::find($id);
        // $books = $author->books;
        // foreach ($books as $book) {
        //     # in ra những sách của 1 id tác giả
        // }
        return view('book.edit', compact('id', 'categories', 'book'));
    }

    public function update($id, Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $publish_at = $request->get('publish_at');
        $categories = $request->get('categories');
        $book = Book::find($id);
        $book->name = $name;
        $book->description = $description;
        $book->publish_at = $publish_at;
        $book->author_id = 1;
        $book->user_id = 1;
        $book->save();
        $book->categories()->sync($categories);
        return redirect()->route('book.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
    }

}

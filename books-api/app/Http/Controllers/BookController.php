<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponse;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show authors list
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return $this->success_api($books->toArray());
    }

    /**
     * Save the author
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'price'       => 'required|numeric|min:0',
            'author_id'   => 'required|integer|min:1'
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->success_api($book, Response::HTTP_CREATED);
    }

    /**
     * Update the author
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title'       => 'max:255',
            'description' => 'max:255',
            'price'       => 'numeric|min:0',
            'author_id'   => 'integer|min:1'
        ];

        $this->validate($request, $rules);

        $book = Book::findorFail($id);

        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->error_api('At least one value must change.', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->success_api($book, Response::HTTP_CREATED);
    }

    /**
     * Show the author by id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return $this->success_api($book, Response::HTTP_CREATED);
    }

    /**
     * Delete the author by id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findorFail($id);
        $book->delete();

        return $this->success_api($book);
    }
}

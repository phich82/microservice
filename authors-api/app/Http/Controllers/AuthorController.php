<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
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
        $authors = Author::all();

        return $this->success_api($authors->toArray());
    }

    /**
     * Save the author
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'    => 'required|max:255',
            'gender'  => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());

        return $this->success_api($author, Response::HTTP_CREATED);
    }

    /**
     * Update the author
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'    => 'required|max:255',
            'gender'  => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::findorFail($id);

        $author->fill($request->all());

        if ($author->isClean()) {
            return $this->error_api('At least one value must change.', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->success_api($author, Response::HTTP_CREATED);
    }

    /**
     * Show the author by id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);

        return $this->success_api($author, Response::HTTP_CREATED);
    }

    /**
     * Delete the author by id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findorFail($id);
        $author->delete();

        return $this->success_api($author);
    }
}

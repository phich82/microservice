<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;

class BookController extends Controller
{
    use ApiResponse;

    /**
     * The books service
     *
     * @var BookService
     */
    private $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Get the books list
     *
     * @return string
     */
    public function index()
    {
        return $this->success_api($this->bookService->books());
    }

    /**
     * Get the author by id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show($id)
    {
        return $this->success_api($this->bookService->book($id));
    }

    /**
     * Save the author
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return string
     */
    public function store(Request $request)
    {
        return $this->success_api($this->bookService->create($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Update the author
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return string
     */
    public function update(Request $request, $id)
    {
        return $this->success_api($this->bookService->update($request->all(), $id));
    }

    /**
     * Delete the author
     *
     * @param  int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        return $this->success_api($this->bookService->destroy($id));
    }
}

<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponse;

    /**
     * The service for the authors microservice
     *
     * @var BookService
     */
    public $bookService;

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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->success_api($this->bookService->destroy($id));
    }
}

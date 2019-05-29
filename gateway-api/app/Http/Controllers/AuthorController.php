<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponse;

    /**
     * The service for the authors microservice
     *
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Show authors list
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success_api($this->authorService->authors());
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
        return $this->success_api($this->authorService->author($id));
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
        return $this->success_api($this->authorService->create($request->all(), Response::HTTP_CREATED));
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
        return $this->success_api($this->authorService->update($request->all(), $id));
    }

    /**
     * Delete the author by id
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->success_api($this->authorService->destroy($id));
    }
}

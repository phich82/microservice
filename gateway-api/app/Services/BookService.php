<?php

namespace App\Services;

use App\Traits\ExternalService;

class BookService
{
    use ExternalService;

    /**
     * The base uri for the books service
     *
     * @var string
     */
    public $baseUri;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    /**
     * Get the books list
     *
     * @return string
     */
    public function books()
    {
        return $this->get('/books');
    }

    /**
     * Get the books by id
     *
     * @return string
     */
    public function book($id)
    {
        return $this->get("/books/{$id}");
    }

    /**
     * Create new book
     *
     * @param  array $params
     *
     * @return string
     */
    public function create($params)
    {
        return $this->post("/books", $params);
    }

    /**
     * Update the book
     *
     * @param  array $params
     * @param  int $id
     *
     * @return string
     */
    public function update($params, $id)
    {
        return $this->put("/books/{$id}", $params);
    }

    /**
     * Delete the book
     *
     * @param  int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        return $this->delete("/books/{$id}");
    }

    /**
     * Delete the book
     *
     * @param  int $id
     *
     * @return string
     */
    public function remove($id)
    {
        return $this->destroy($id);
    }
}

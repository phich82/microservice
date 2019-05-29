<?php

namespace App\Services;

use App\Traits\ExternalService;

class AuthorService
{
    use ExternalService;

    /**
     * The base uri for the authors service
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
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Get the authors list
     *
     * @return string
     */
    public function authors()
    {
        return $this->get('/authors');
    }

    /**
     * Get the author by id
     *
     * @return string
     */
    public function author($id)
    {
        return $this->get("/authors/{$id}");
    }

    /**
     * Create new author
     *
     * @param  array $params
     *
     * @return string
     */
    public function create($params)
    {
        return $this->post("/authors", $params);
    }

    /**
     * Update the author
     *
     * @param  array $params
     * @param  int $id
     *
     * @return string
     */
    public function update($params, $id)
    {
        return $this->put("/authors/{$id}", $params);
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
        return $this->delete("/authors/{$id}");
    }

    /**
     * Delete the author
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

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
     * create
     *
     * @param  array $data
     *
     * @return string
     */
    public function create($data)
    {
        return $this->post('/authors', $data);
    }

    /**
     * Get the author by id
     *
     * @param  int $id
     *
     * @return string
     */
    public function author($id)
    {
        return $this->get("/authors/{$id}");
    }

    /**
     * Update the author by id
     *
     * @param  array $data
     * @param  int $id
     *
     * @return string
     */
    public function update($data, $id)
    {
        return $this->put("/authors/{$id}", $data);
    }

    /**
     * Delete the author by id
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
     * Delete the author by id
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

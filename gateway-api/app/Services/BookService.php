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

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }
}

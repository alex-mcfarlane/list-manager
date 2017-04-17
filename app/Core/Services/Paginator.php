<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017-04-16
 * Time: 8:03 PM
 */

namespace App\Core\Services;


use Illuminate\Support\Collection;

class Paginator
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param int $limit
     * @param int $page
     * @return Collection
     */
    public function paginate($limit, $page = 0)
    {
        $chunks = $this->collection->chunk($limit);

        return $chunks[$page];
    }
}
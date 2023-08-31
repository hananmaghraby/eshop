<?php

namespace App\Query\Shop\Brand\Find;

use App\ReadRepository\Shop\BrandReadRepository;

class FindBrandsQueryHandler
{
    private $brands;

    public function __construct(BrandReadRepository $brands)
    {
        $this->brands = $brands;
    }

    public function __invoke(FindBrandsQuery $query)
    {
        $brands = $this->brands->findAllPaginate();
        return $brands;
    }
}
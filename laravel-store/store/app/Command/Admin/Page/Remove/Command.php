<?php

namespace App\Command\Admin\Page\Remove;

use App\Entity\Page;

class Command
{
    public $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }
}
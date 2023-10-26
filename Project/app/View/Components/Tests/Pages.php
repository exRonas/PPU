<?php

namespace App\View\Components\Tests;

use Illuminate\View\Component;

class Pages extends Component
{
    public $pages;
    public function __construct($pages)
    {
        $this->pages = $pages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tests.pages');
    }
}

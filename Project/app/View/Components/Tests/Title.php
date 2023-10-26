<?php

namespace App\View\Components\Tests;

use Illuminate\View\Component;

class Title extends Component
{
    public $textTitle;
    public function __construct($textTitle)
    {
        $this->textTitle = $textTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tests.title');
    }
}

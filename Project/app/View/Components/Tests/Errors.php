<?php

namespace App\View\Components\Tests;

use Illuminate\View\Component;

class Errors extends Component
{
    public $message;
    public $many;
    public function __construct($message, $many)
    {
        $this->message = $message; 
        $this->many = $many; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tests.errors');
    }
}

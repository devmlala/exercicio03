<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionContainer extends Component
{
    public $title;
    public $description;
    public $items;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $description
     * @param array $items
     */
    public function __construct(string $title, string $description, array $items)
    {
        $this->title = $title;
        $this->description = $description;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section-container');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class article extends Component
{
    public $article;
    public $comments;
    /**
     * Create a new component instance.
     */
    public function __construct($article,$comments)
    {
        $this->article = $article;
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article');
    }
}

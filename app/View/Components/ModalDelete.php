<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Closure;
use Illuminate\Contracts\View\View;

class ModalDelete extends Component
{
    public function __construct(
        public string $id = 'modalDelete'
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.modal-delete');
    }
}

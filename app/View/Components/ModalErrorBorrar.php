<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Closure;
use Illuminate\Contracts\View\View;

class ModalErrorBorrar extends Component
{
    public function __construct(
        public string $id = 'modalBorrarError',
        public ?string $message = null,
        public bool $show = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.modal-error-borrar');
    }
}

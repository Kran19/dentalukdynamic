<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct(
        public string $title = 'Icon Dental- Wembley | Exceptional Dental Care',
        public string $description = 'At Icon Dental- Wembley, we combine advanced technology with a gentle, personal touch to create healthy, confident smiles that last a lifetime.'
    ) {}

    public function render(): View
    {
        return view('layouts.app');
    }
}

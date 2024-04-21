<?php

namespace App\View\Components\Navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public array $menuItems;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menuItems = [
            'Главная' => route('home'),
            'Наши звери' => route('animals')
        ];

        if (\App\Models\User::where(['ip_address' => request()->getClientIp()])->first()) {
            $this->menuItems['Добавить в зоопарк'] = route('add-animal');
            $this->menuItems['Выйти'] = route('logout');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.navigation');
    }
}

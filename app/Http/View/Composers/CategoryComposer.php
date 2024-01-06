<?php

namespace App\Http\View\Composers;
 
use App\Models\Menu;
use Illuminate\View\View;

class CategoryComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $categories = Menu::select('id', 'name_category', 'url')->where('status', 1)->get();

        $view->with('categories', $categories);
    }
}
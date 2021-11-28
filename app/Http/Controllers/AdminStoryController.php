<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class AdminStoryController extends Controller
{public function create(): Factory|View
{
        return view('admin.stories.create');
    }

    public function store(): Redirector|RedirectResponse
    {
        $attributes = request()?->validate([
            'title' => ['required', Rule::unique('stories', 'title')],
            'description' => 'required',
        ]);

        request()
            ?->user()
            ->stories()
            ->create($attributes)
        ;

        return redirect('/')->with('success', 'Story created!');
    }
}

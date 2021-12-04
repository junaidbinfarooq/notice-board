<?php

namespace App\Http\Controllers;

use App\Events\StoryApproved;
use App\Mail\StoryAdded;
use App\Models\Story;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminStoryController extends Controller
{
    public function create(): Factory|View
    {
        return view('admin.stories.create');
    }

    public function store(): Redirector|RedirectResponse
    {
        $attributes = request()?->validate([
            'title' => ['required', 'min:4', 'max:255', Rule::unique('stories', 'title')],
            'description' => ['required', 'min:4', 'max:255'],
        ]);

        $user = request()?->user();
        $story = $user
            ->stories()
            ->create($attributes)
        ;

        Mail::to($user->email)->send(new StoryAdded($story));

        return redirect('/')->with('success', 'Story created!');
    }

    public function approve(Story $story): RedirectResponse
    {
        $story->approved = 1;
        $story->save();

        StoryApproved::dispatch($story);

        return redirect()
            ->back()
            ->with('success', 'Story approved!')
        ;
    }
}

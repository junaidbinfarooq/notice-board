<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class StoryController extends Controller
{
    public function index(): Factory|View
    {
        return view('stories.index', [
            'stories' => Story::latest()->paginate(18),
        ]);
    }

    public function show(Story $story): Factory|View
    {
        return view('stories.show', [
            'story' => $story,
        ]);
    }
}

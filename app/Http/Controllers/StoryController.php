<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;

final class StoryController extends Controller
{
    public function index(): Collection|array
    {
        return Story::all();
    }
}

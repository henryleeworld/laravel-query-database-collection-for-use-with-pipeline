<?php

namespace App\Http\Controllers;

use App\Models\User;
use Baro\PipelineQueryCollection\DateFromFilter;
use Baro\PipelineQueryCollection\DateToFilter;
use Baro\PipelineQueryCollection\RelativeFilter;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $users = User::query()->filter([
            new RelativeFilter('name'),
            new DateFromFilter('created_at'),
            new DateToFilter('created_at'),
        ])->get();
        echo __('Email: ') . $users->firstOrFail()->email . PHP_EOL;
    }
}

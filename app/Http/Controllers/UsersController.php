<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Baro\PipelineQueryCollection\RelativeFilter;
use Baro\PipelineQueryCollection\DateFromFilter;
use Baro\PipelineQueryCollection\DateToFilter;

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
        //dd($users);
        echo '電子郵件：' . $users->firstOrFail()->email . PHP_EOL;
    }
}

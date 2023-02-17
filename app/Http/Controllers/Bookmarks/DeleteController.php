<?php

namespace App\Http\Controllers\Bookmarks;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Bookmark $bookmark)
    {
        //
        $bookmark->delete();

        return redirect()->route('dashboard');
    }
}

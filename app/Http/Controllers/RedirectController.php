<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(string $slug)
    {
        $link = Link::where('slug', $slug)->first();

        if (is_null($link))
            return redirect()->route('link.create');

        header('Location: ' . $link->url);
        exit;
    }
}

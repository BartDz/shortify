<?php

namespace App\Http\Controllers;

use App\Models\Link;

class RedirectController extends Controller
{
    public function redirect(string $slug)
    {
        $link = Link::where('slug', $slug)->first();

        if (is_null($link))
            return redirect()->route('link.create');

        header('Location: ' . $link->url);
        return redirect($link->url);
    }
}

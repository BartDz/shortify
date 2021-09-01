<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLinkRequest;
use App\Models\Link;
use Illuminate\Http\Response;


class LinkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLinkRequest $request
     * @return array
     */
    public function store(StoreLinkRequest $request)
    {
        $existingShortLink = Link::where('url', $request->url)->first();
        
        if ($existingShortLink)
            return [
                'short_url' => url($existingShortLink->slug),
                'success' => true
            ];

        $newLinkSlug = Link::generateNewSlug();
        
        $newLink = new Link();
        $newLink->slug = $newLinkSlug;
        $newLink->url = $request->url;
        $newLink->save();

        return [
            'short_url' => url($newLinkSlug),
            'success' => true
        ];
    }
}

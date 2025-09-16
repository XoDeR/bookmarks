<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchString = Request::get('search') ?? '';
        $filteredTags = Request::get('tags') ?? '';
        $showUntaggedOnly = Request::get('untaggedOnly') ?? false;
        $filteredTags = empty($filteredTags) ? [] : explode(',', $filteredTags);

        $perPage = 10;
        return Inertia::render('Links/Index', [
            'links' => Link::orderBy('created_at', 'desc')->paginate($perPage),

            'searchString' => $searchString,
            'filteredTags' => $filteredTags ? TagController::getTagsByNames($filteredTags) : [],
            'showUntaggedOnly' => $showUntaggedOnly,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}

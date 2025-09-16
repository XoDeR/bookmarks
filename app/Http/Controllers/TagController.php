<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Tags\Tag;
use Illuminate\Database\Eloquent\Builder;

class TagController extends Controller
{
    /**
     * Returns tags by their names
     */
    public static function getTagsByNames(array $names): array
    {
        $locale = $locale ?? Tag::getLocale();

        return Tag::filterByCurrentUser()
            ->where(function (Builder $query) use ($names, $locale) {
                foreach ($names as $name) {
                    $query->orWhere("name->$locale", $name);
                }
            })
            ->get()
            ->transform(fn (Tag $tag) => [
                'id' => $tag->id,
                'name' => $tag->name,
            ])
            ->toArray();
    }
}

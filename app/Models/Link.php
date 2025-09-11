<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Tags\HasTags;

class Link extends Model implements Searchable
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'title',
        'link',
    ];

    public string $searchableType = 'Links';

    public function groups(): MorphToMany
    {
        return $this->morphToMany(Group::class, 'groupable');
    }

    public function groupIds(): array
    {
        return $this->groups()->pluck('id')->toArray();
    }

    public function tagIds(): array
    {
        return $this->tags()->pluck('id')->toArray();
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('links.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}

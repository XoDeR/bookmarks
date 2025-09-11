<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PublicLink extends Model
{
    /** @use HasFactory<\Database\Factories\PublicLinkFactory> */
    use HasFactory;

    public function publicLinkable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getLink(): string
    {
        return url("share/$this->share_id");
    }
}

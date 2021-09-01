<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{
    use HasFactory;

    /**
     * Turn of timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'slug';

    public $incrementing = false;
    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Generates new slug for short link
     *
     * @return string
     */
    public static function generateNewSlug(): string
    {
        do {
            $slug = Str::random(10);
        } while (Link::where('slug', $slug)->first());

        return $slug;
    }

    public function redirectToOnet(){
        header('Location: https://onet.pl');
        return true;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quality extends Model
{
    use HasTranslations;

    protected $fillable = ['quality', 'icon'];
    public array $translatable =  ['quality'];
}

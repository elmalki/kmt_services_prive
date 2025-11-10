<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Preference extends Model
{
    /** @use HasFactory<\Database\Factories\PreferenceFactory> */
    use HasFactory;
    protected $fillable = ['name'];
    public function customers():BelongsToMany{
        return $this->BelongsToMany(Customer::class)->withPivot('value');
    }
}

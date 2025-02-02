<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class roles extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['name'];

    public function user() : BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}

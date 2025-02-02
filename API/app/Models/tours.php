<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class tours extends Model
{
    use HasFactory, HasUuids, HasApiTokens;

    protected $fillable = [
        'travel_id',
        'name',
        'starting_date',
        'ending_date',
        'price',
    ];

    public function price(): Attribute
    {//TODO: STUDY THIS LOGIC
        return Attribute::make(
            get: fn ($value) => $value/100,
            set: fn ($value) => $value * 100
        );
    }

    public function gettingTheAttribute()
    {
        return $this->price();
    }

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }



}

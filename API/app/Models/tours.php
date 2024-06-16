<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tours extends Model
{
    use HasFactory, HasUuids, Sluggable;

    protected $fillable = [
        'travel_id',
        'name',
        'starting_date',
        'ending_date',
        'price',
    ];

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value/100,
            set: fn ($value) => $value * 100
        );
    }

    public function sluggable(): array
    {
        return
        [
            'slug'=>[
                'resources' =>'name'
            ]
        ];
    }
}

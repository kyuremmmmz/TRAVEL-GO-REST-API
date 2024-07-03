<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Travel extends Model
{
    use HasFactory, Sluggable, HasUuids, HasApiTokens;
    //TODO: study the logic here
    protected $table = 'travel';
    protected $fillable = [
        'is_public',
        'slug',
        'name',
        'description',
        'number_of_days'
    ];

    public function tours(): HasMany
    {
        return $this->hasMany(tours::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function numberOfNights(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes)=>$attributes['number_of_days']-1

        );
    }
}

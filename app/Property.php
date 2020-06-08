<?php

namespace App;

use Illuminate\Support\Str;

class Property extends BaseModel
{

    /**
     * Boot method to handle events
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(
            function ($property) {
                $property->guid = Str::uuid();
            }
        );
    }

    public function analytics()
    {
        return $this->belongsToMany(AnalyticType::class,
            'property_analytics',
            'analytic_type_id',
            'property_id'
        )
            ->withPivot('value');
    }

}

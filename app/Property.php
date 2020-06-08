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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function analytics()
    {
        return $this->hasMany(PropertyAnalytic::class);
    }
}

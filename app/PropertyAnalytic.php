<?php

namespace App;

class PropertyAnalytic extends BaseModel
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function analyticType()
    {
        return $this->belongsTo(AnalyticType::class);
    }
}

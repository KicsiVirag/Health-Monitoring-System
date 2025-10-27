<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $pimaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = [
        'user_id',
        'event_date',
        'event_description'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function eat(): HasOne
    {
        return $this->hasOne(Eating::class);
    }

    public function measure(): HasOne
    {
        return $this->hasOne(Measure::class);
    }

    public function training(): HasOne
    {
        return $this->hasOne(Training::class);
    }

    public function sleep(): HasOne
    {
        return $this->hasOne(Sleep::class);
    }
}

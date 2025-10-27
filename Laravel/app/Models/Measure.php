<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Measure extends Model
{
    use HasFactory;
    protected $table = 'measures';
    protected $pimaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        "id",
        "event_id",
        "pulse",
        "blood_pressure"
    ];

    public function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }
}

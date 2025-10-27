<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Eating extends Model
{
    use HasFactory;
    protected $table = 'eatings';
    protected $pimaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        "id",
        "event_id",
        "calories_morning",
        "calories_evening",
        "calories_noon",
        "medicine",
        "amount_of_liquid"
    ];

    public function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }
}

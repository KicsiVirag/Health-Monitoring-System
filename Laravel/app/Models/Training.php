<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model
{
    use HasFactory;
    protected $table = 'trainings';
    protected $pimaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        "id",
        "event_id",
        "number_of_steps",
        "training_intensity",
        "training_durration",
        "training_type",
        "training_location"
    ];

    public function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sleep extends Model
{
    use HasFactory;
    protected $table = 'sleeps';
    protected $pimaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        "id",
        "event_id",
        "sleep_durration",
        "number_of_awaking",
        "sleep_quality"
    ];
    public function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }
}

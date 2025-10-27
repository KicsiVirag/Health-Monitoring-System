<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Health extends Model
{
    use HasFactory;
    protected $table = 'healths';
    protected $pimaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public $fillable =[
        'user_id','weight','height','date'
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}

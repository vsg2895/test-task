<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Translation extends Model
{
    use HasFactory;

    const SUCCESS = "Translation Created Successfully";
    const FAIL = "Something went wrong";

    protected $fillable = [
        'key', 'language_id'
    ];

    public function translations(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}

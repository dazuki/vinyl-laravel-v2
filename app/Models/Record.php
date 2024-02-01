<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public function scopeSearch($query, $value)
    {
        $values = str_replace(' ', '%', $value);
        return $query->whereRAW('record_name like ? and user_id = ' . auth()->id() . ' COLLATE NOCASE', '%' . mb_strtolower($values) . '%');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}

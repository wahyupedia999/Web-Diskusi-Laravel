<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $table = 'replies';

    protected $fillable = ['balasan', 'created_at', 'updated_at', 'id_pertanyaan', 'id_user'];

    public function questions()
    {
        return $this->belongsTo(Questions::class, 'id_pertanyaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

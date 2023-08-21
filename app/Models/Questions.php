<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = ['judul', 'isi', 'files', 'created_at', 'updated_at', 'id_category', 'id_user'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function replies()
    {
        return $this->hasMany(Replies::class, 'id_pertanyaan');
    }
}

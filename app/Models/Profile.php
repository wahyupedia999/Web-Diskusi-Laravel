<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'profile';

    protected $fillable = ['nama', 'ttl', 'jenis_kelamin', 'alamat', 'pekerjaan', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'invite_code', 'created_by'];

    // Anggota dalam tim (Many-to-Many via pivot)
    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('role')->withTimestamps();
    }

    // Daftar semua tugas dalam tim ini
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

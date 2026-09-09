<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'deadline',
        'team_id',
        'created_by',
        'assigned_to',
    ];

    // Tugas milik satu tim
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Pembuat tugas
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Anggota yang diberi tugas (assignee)
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}

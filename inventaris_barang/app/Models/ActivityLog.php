<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_log'; // Menentukan nama tabel secara eksplisit

    protected $fillable = [
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
        'event',
        'batch_uuid',
    ];

    protected $casts = [
        'properties' => 'json',
        'batch_uuid' => 'string',
    ];

    // Relasi Polymorphic untuk subject
    public function subject()
    {
        return $this->morphTo();
    }

    // Relasi Polymorphic untuk causer
    public function causer()
    {
        return $this->morphTo();
    }
}
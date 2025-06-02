<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Item extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'description', 'quantity', 'category_id', 'supplier_id'];

    // Konfigurasi Activity Log
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'description', 'quantity', 'category_id', 'supplier_id']) // Kolom yang dicatat
            ->logOnlyDirty() // Hanya catat perubahan
            ->setDescriptionForEvent(fn(string $eventName) => "Barang {$this->name} telah " . [
                'created' => 'ditambahkan',
                'updated' => 'diperbarui',
                'deleted' => 'dihapus'
            ][$eventName]);
    }

    // Relasi
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'name',
        'code',
        'category_id',
        'unit_id',
        'vendor_id',
        'status',
        'purchase_date',
        'purchase_price',
        'warranty_expiry',
    ];

    protected static function booted()
    {
        static::creating(function ($asset) {
            if (empty($asset->code)) {
                $month = now()->format('m');
                $year = now()->format('Y');

                $lastcode = static::whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->orderBy('code', 'desc')
                    ->value('code');

                if ($lastcode) {
                    $lastnumber = (int) explode('/', $lastcode)[1];
                    $newNumber = str_pad($lastnumber + 1, 4, '0', STR_PAD_LEFT);
                } else {
                    $newNumber= '0001';
                }

                $asset->code = "ASSET-{$newNumber}-{$month}-{$year}";
            }
        });
    }

    // ⭐ Tambahkan relasi
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}

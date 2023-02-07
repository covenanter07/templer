<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoxInside extends Model
{
    use HasFactory;
    use SoftDeletes; // use SoftDeletes

    // protected $fillable = ['quantity']; // laravel doc設定的, []放入想要的值為白名單
    protected $guarded = ['']; // laravel doc設定的, []放入想要的值為黑名單 ,要是 [''] 代表每個欄位都可做更動
    // protected $hidden = ['updated_at']; // 可隱藏欄位
    protected $appends = ['current_price']; // 自製屬性

    public function getCurrentPriceAttribute()
    {
        return $this->quantity * 10;
    }


    public function milk()
    {
        return $this->belongsTo(Milk::class);

    }

    public function box()
    {
        return $this->belongsTo(Box::class);

    }
}

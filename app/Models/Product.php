<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $fillable = [
      'name',
      'category_id',
      'barcode',
      'price',
      'unit',
      'picture',
      'stock'
    ];

    public static function boot()
    {
      parent::boot();
      static::creating(function ($model) {
        $model->user_id = Auth()->user()->id;
        return true;
      });
    }

    public function category()
    {
      return $this->belongsTo('App\Models\Category')->select('name', 'id');
    }
}

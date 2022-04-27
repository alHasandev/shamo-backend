<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProductImage extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'product_id',
    'url'
  ];

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }

  /**
   * Get fullpath of product image's url.
   *
   * @param  string  $url
   * @return \Illuminate\Database\Eloquent\Casts\Attribute
   */
  public function url(): Attribute
  {
    return Attribute::make(
      get: fn ($url) => config('app.url') . Storage::url($url)
    );
  }
}

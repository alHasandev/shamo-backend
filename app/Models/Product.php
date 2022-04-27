<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'thumbnail',
    'name',
    'category_id',
    'price',
    'description',
    'tag'
  ];

  public function productImages()
  {
    return $this->hasMany(ProductImage::class, 'product_id', 'id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  public function transactionItems()
  {
    return $this->hasMany(TransactionItem::class, 'product_id', 'id');
  }
}

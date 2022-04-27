<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'transaction_id',
    'product_id',
    'price',
    'quantity',
  ];

  public function transaction()
  {
    return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
  }

  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'product_id');
  }
}

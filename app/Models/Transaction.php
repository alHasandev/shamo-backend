<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'customer_id',
    'customer_address',
    'payment_method',
    'total_price',
    'shipping_price',
    'status',
  ];

  public function customer()
  {
    return $this->belongsTo(User::class, 'customer_id', 'id');
  }

  public function transactionItems()
  {
    return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
  }
}

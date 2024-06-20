<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table='books';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'title',
        'author',
        'price',
        'stock',
        'book_category_id',
        'created_at',
        'updated_at',
    ];

    public function categoryDetails() {
        return $this->hasOne( BookCate::class, 'id', 'book_category_id' );
    }
}

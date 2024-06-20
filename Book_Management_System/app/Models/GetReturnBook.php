<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetReturnBook extends Model
{
    use HasFactory;
   
    protected $table='get_return_books';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'book_id',
       
        'no_of_book',
        'get_date',
        'contact_no',
        'member',
        'return_status',
        'created_at',
        'updated_at',
    ];
    public function bookDetails() {
        return $this->hasOne( Books::class, 'id', 'book_id' );
    }
}

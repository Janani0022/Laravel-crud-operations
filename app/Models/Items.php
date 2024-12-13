<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'Item_Id', 'Item_Name', 'Category', 'Supplier', 'Quantity_in_Stock', 'Unit_Price', 'Date_Last_Ordered', 'Date_of_Restock'
    ];

}

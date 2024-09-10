<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name', 'category_id'];

    // Define o relacionamento com a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    //set e get -> set() altera a ',' por '.', já get() mostra na view a ','    
    public function setPrecoAttribute($value){
        $this->attributes['preco'] = str_replace(',','.',$value);
    }
    
    public function getPrecoAttribute($value){
        return number_format($value, 2, ',', '');
    }







}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'location',
        'date',
        'vaccine',
        'source_url',
        'total_vaccinations',
        'people_vaccinated',
        'people_fully_vaccinated',
        'total_boosters',
    ];

    

    // Mutator para salvar a data no formato 'yyyy-mm-dd'
    public function setDateAttribute($value)
    {
        if ($value) {
            // Converte 'dd/mm/yyyy' para 'yyyy-mm-dd'
            $dateParts = explode('/', $value);
            if (count($dateParts) === 3) {
                $this->attributes['date'] = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
            }
        }
    }

    // Mutator para exibir a data no formato 'dd/mm/yyyy'
    public function getDateAttribute($value)
    {
        if ($value) {
            // Converte 'yyyy-mm-dd' para 'dd/mm/yyyy'
            $dateParts = explode('-', $value);
            if (count($dateParts) === 3) {
                return $dateParts[2] . '/' . $dateParts[1] . '/' . $dateParts[0];
            }
        }
        return null;
    }
}

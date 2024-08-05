<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'total_vaccinations', 
        'people_vaccinated', 
        'location', 
        'date', 
        'vaccine', 
        'source_url', 
        'people_fully_vaccinated', 
        'total_boosters',
    ];

    // Accessor para formatar a data como dd/mm/yyyy
    public function getDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    // Mutator para salvar a data no formato yyyy-mm-dd
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }
}

<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Defina a tabela associada se não seguir a convenção padrão
    protected $table = 'categories';

    // Atributos que podem ser atribuídos em massa
    protected $fillable = [
        'name', // Exemplo de atributo, ajuste conforme necessário
    ];

    /**
     * Relacionamento com materiais
     * 
     * Uma categoria pode ter muitos materiais.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}

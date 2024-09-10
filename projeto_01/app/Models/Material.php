<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Defina a tabela associada se não seguir a convenção padrão
    protected $table = 'materials';

    // Atributos que podem ser atribuídos em massa
    protected $fillable = [
        'title', // Título do material
        'description',
        'content', // Conteúdo do material
        'category_id', // Relacionamento com categorias
        'user_id', // Relacionamento com usuários
    ];

    /**
     * Relacionamento com categoria
     * 
     * Um material pertence a uma categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relacionamento com usuário
     * 
     * Um material pertence a um usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

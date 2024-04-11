<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaFrecuente extends Model
{

    use HasFactory;

    protected $table = 'preguntas_frecuentes';

    protected $fillable = ['name', 'image', 'title', 'content'];

    /**
     * Añade una nueva pregunta frecuente a la base de datos.
     *
     * @param array $data
     * @return PreguntaFrecuente
     */
    public static function add(array $data): PreguntaFrecuente
    {
        return self::create($data);
    }

    /**
     * Edita una pregunta frecuente existente en la base de datos.
     *
     * @param array $data
     * @return bool
     */
    public function edit(array $data): bool
    {
        return $this->update($data);
    }

    /**
     * Elimina una pregunta frecuente de la base de datos.
     *
     * @return bool|null
     */
    public function remove(): ?bool
    {
        return $this->delete();
    }
    
}

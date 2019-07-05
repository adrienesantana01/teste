<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Musica extends Model
{
    protected $fillable = [
		'name', 'genero', 'artista','duracao'
    ];
}
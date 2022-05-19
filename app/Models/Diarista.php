<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    //define campos que pode sem gravados
     protected $fillable = [
         'nome_completo', 
         'cpf', 
         'email', 
         'telefone', 
         'logradouro', 
         'numero', 
         'bairro',
         'complemento', 
         'cidade', 
         'estado', 
         'cep', 
         'codigo_ibge', 
         'foto_usuario'
        ];  

        //Define os campos que serão usados na serialização
        protected $visible = ['nome_completo', 'cidade', 'foto_usuario', 'reputacao'];

        //Adiciona campos na serialização
        protected $appends = ['reputacao'];

        //Monta a URL da imagem
        public function getFotoUsuarioAttribute(string $valor){

            return config('app.url') . '/' . $valor;
        }

        //Retorna a reputação randomica
        public function getReputacaoAttribute($valor){

            return mt_rand(1, 5);
        }


        //Busca diaristas por ibge
        static public function buscaPorCodigoIbge(int $codigoIbge){
            return self::where('codigo_ibge', $codigoIbge)->limit(6)->get();
        }

        //retorna a quantidade de diaristas
        static public function quantidadePorCodigoIbge(int $codigoIbge){
            $quantidade = self::where('codigo_ibge', $codigoIbge)->count();

            return $quantidade > 6 ? $quantidade - 6 : 0;
        }
}

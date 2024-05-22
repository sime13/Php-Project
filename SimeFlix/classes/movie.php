<?php
class Movie
{
    public $titulo;
    public $genero;
    public $imagem;
    public $video;
    public $descricao;

    public function __construct($titulo, $genero, $imagem, $video, $descricao)
    {
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->imagem = $imagem;
        $this->video = $video;
        $this->descricao = $descricao;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getGenero()
    {
        return $this->genero;
    }

    public function getDescricoa()
    {
        return $this->descricao;
    }

    public function getImagem()
    {
        return $this->imagem;
    }
    public function getVideo()
    {
        return $this->video;
    }
}

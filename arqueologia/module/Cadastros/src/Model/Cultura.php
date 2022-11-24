<?php
namespace Cadastros\Model;

class Cultura
{
    public $codigo;
    public $nome;

    public function toArray()
    {
        return get_object_vars($this);
    }

}
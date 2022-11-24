<?php
namespace Cadastros\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;

class CulturaTable {
    private TableGatewayInterface $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function gravar(Cultura $cultura)
    {
        $set = $cultura->toArray();
        if (empty($set['codigo'])) {
            unset($set['codigo']);
            return $this->tableGateway->insert($set);
        }
        return $this->tableGateway->update($set,
        ['codigo' => $set['codigo']]);
    }

    public function listar()
    {
        return $this->tableGateway->select();
    }

    public function excluir(int $codigo)
    {
        return $this->tableGateway->delete(['codigo' => $codigo]);
    }

    public function get(int $codigo)
    {
        $culturas = $this->tableGateway->select(['codigo' => $codigo]);
        if ($culturas->count() == 0){
            $cultura = new StdClass();
            $cultura->codigo = 0;
            $cultura->nome = '';
            return $cultura;
        }
        return $culturas->current();
    }



}
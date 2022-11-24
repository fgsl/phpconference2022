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

        return $this->tableGateway->insert($set);
    }



}
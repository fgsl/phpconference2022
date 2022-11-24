<?php
namespace Cadastros\Model;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\Db\TableGateway\TableGateway;

class CulturaTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)    
    {
        $dbAdapter = $container->get('DbAdapter');
        $tableGateway = new TableGateway('culturas',$dbAdapter);
        $culturaTable = new CulturaTable($tableGateway);
        return $culturaTable;
    }
}
<?php
namespace Cadastros\Controller;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class CulturaControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $culturaTable = $container->get('CulturaTable');
        return new CulturaController($culturaTable);    
    }    
}
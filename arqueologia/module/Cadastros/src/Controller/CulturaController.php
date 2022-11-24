<?php

declare(strict_types=1);

namespace Cadastros\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Cadastros\Model\CulturaTable;
use Cadastros\Model\Cultura;

class CulturaController extends AbstractActionController
{
    private CulturaTable $culturaTable;

    public function __construct(CulturaTable $culturaTable)
    {
        $this->culturaTable = $culturaTable;
    }

    public function indexAction()
    {
        $culturas = $this->culturaTable->listar();

        return new ViewModel(['culturas' => $culturas]);
    }

    public function editarAction()
    {
        $codigo = (int) $this->params('codigo');
        $nome = '';
        if (!empty($codigo)){
            $cultura = $this->culturaTable->get($codigo);
        }

        return new ViewModel(['cultura' => $cultura]);
    }

    public function gravarAction()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');

        $cultura = new Cultura();
        $cultura->codigo = $codigo;
        $cultura->nome = $nome;

        $this->culturaTable->gravar($cultura);

        return $this->redirect()->toRoute('cultura');
    }

    public function excluirAction()
    {
        $codigo = (int) $this->params('codigo');

        $this->culturaTable->excluir($codigo);

        return $this->redirect()->toRoute('cultura');
    }


}

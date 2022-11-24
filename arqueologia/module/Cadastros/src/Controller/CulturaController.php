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
        return new ViewModel();
    }

    public function editarAction()
    {
        return new ViewModel();
    }

    public function gravarAction()
    {
        $nome = $this->getRequest()->getPost('nome');

        $cultura = new Cultura();
        $cultura->nome = $nome;

        $this->culturaTable->gravar($cultura);

        return $this->redirect()->toRoute('cultura');
    }

}

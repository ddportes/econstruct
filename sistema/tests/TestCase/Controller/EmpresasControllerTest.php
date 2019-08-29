<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EmpresasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\EmpresasController Test Case
 *
 * @uses \App\Controller\EmpresasController
 */
class EmpresasControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Empresas',
        'app.ClienteSituacoes',
        'app.Clientes',
        'app.Contratos',
        'app.Enderecos',
        'app.EquipePedreiros',
        'app.Equipes',
        'app.FornecedorSituacoes',
        'app.Fornecedores',
        'app.Itens',
        'app.Notas',
        'app.OcorrenciaTipos',
        'app.Ocorrencias',
        'app.Orcamentos',
        'app.Papeis',
        'app.PedreiroSituacoes',
        'app.Pedreiros',
        'app.PermissaoPapeis',
        'app.Permissoes',
        'app.Pessoas',
        'app.ProdutoTipos',
        'app.Produtos',
        'app.ProjetoSituacoes',
        'app.Projetos',
        'app.Recebimentos',
        'app.Recibos',
        'app.Rendas',
        'app.UserPapeis',
        'app.Users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

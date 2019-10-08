<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpresasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpresasTable Test Case
 */
class EmpresasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpresasTable
     */
    public $Empresas;

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
        'app.Users',
        'app.Contatos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Empresas') ? [] : ['className' => EmpresasTable::class];
        $this->Empresas = TableRegistry::getTableLocator()->get('Empresas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Empresas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

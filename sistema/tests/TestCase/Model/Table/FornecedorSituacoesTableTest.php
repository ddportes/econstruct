<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FornecedorSituacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FornecedorSituacoesTable Test Case
 */
class FornecedorSituacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FornecedorSituacoesTable
     */
    public $FornecedorSituacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FornecedorSituacoes',
        'app.Fornecedores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FornecedorSituacoes') ? [] : ['className' => FornecedorSituacoesTable::class];
        $this->FornecedorSituacoes = TableRegistry::getTableLocator()->get('FornecedorSituacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FornecedorSituacoes);

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
}

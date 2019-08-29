<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjetoSituacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjetoSituacoesTable Test Case
 */
class ProjetoSituacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjetoSituacoesTable
     */
    public $ProjetoSituacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjetoSituacoes',
        'app.Projetos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjetoSituacoes') ? [] : ['className' => ProjetoSituacoesTable::class];
        $this->ProjetoSituacoes = TableRegistry::getTableLocator()->get('ProjetoSituacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjetoSituacoes);

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

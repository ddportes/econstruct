<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedreiroSituacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedreiroSituacoesTable Test Case
 */
class PedreiroSituacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedreiroSituacoesTable
     */
    public $PedreiroSituacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PedreiroSituacoes',
        'app.Pedreiros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PedreiroSituacoes') ? [] : ['className' => PedreiroSituacoesTable::class];
        $this->PedreiroSituacoes = TableRegistry::getTableLocator()->get('PedreiroSituacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PedreiroSituacoes);

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

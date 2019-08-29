<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClienteSituacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClienteSituacoesTable Test Case
 */
class ClienteSituacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClienteSituacoesTable
     */
    public $ClienteSituacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ClienteSituacoes',
        'app.Clientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ClienteSituacoes') ? [] : ['className' => ClienteSituacoesTable::class];
        $this->ClienteSituacoes = TableRegistry::getTableLocator()->get('ClienteSituacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClienteSituacoes);

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

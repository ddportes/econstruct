<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModificacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModificacoesTable Test Case
 */
class ModificacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModificacoesTable
     */
    public $Modificacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Modificacoes',
        'app.Useres',
        'app.Empresas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Modificacoes') ? [] : ['className' => ModificacoesTable::class];
        $this->Modificacoes = TableRegistry::getTableLocator()->get('Modificacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Modificacoes);

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

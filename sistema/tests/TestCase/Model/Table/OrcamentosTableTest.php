<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrcamentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrcamentosTable Test Case
 */
class OrcamentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrcamentosTable
     */
    public $Orcamentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Orcamentos',
        'app.Projetos',
        'app.Contratos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Orcamentos') ? [] : ['className' => OrcamentosTable::class];
        $this->Orcamentos = TableRegistry::getTableLocator()->get('Orcamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Orcamentos);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedreirosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedreirosTable Test Case
 */
class PedreirosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedreirosTable
     */
    public $Pedreiros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pedreiros',
        'app.Pessoas',
        'app.PedreiroSituacoes',
        'app.EquipePedreiros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pedreiros') ? [] : ['className' => PedreirosTable::class];
        $this->Pedreiros = TableRegistry::getTableLocator()->get('Pedreiros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pedreiros);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquipePedreirosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquipePedreirosTable Test Case
 */
class EquipePedreirosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EquipePedreirosTable
     */
    public $EquipePedreiros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EquipePedreiros',
        'app.Equipes',
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
        $config = TableRegistry::getTableLocator()->exists('EquipePedreiros') ? [] : ['className' => EquipePedreirosTable::class];
        $this->EquipePedreiros = TableRegistry::getTableLocator()->get('EquipePedreiros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EquipePedreiros);

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

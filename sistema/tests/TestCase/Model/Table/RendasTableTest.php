<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RendasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RendasTable Test Case
 */
class RendasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RendasTable
     */
    public $Rendas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Rendas',
        'app.Pessoas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rendas') ? [] : ['className' => RendasTable::class];
        $this->Rendas = TableRegistry::getTableLocator()->get('Rendas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rendas);

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

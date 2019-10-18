<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModeloTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModeloTiposTable Test Case
 */
class ModeloTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModeloTiposTable
     */
    public $ModeloTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ModeloTipos',
        'app.Empresas',
        'app.Us',
        'app.Modelos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ModeloTipos') ? [] : ['className' => ModeloTiposTable::class];
        $this->ModeloTipos = TableRegistry::getTableLocator()->get('ModeloTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModeloTipos);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OcorrenciaTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OcorrenciaTiposTable Test Case
 */
class OcorrenciaTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OcorrenciaTiposTable
     */
    public $OcorrenciaTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OcorrenciaTipos',
        'app.Ocorrencias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OcorrenciaTipos') ? [] : ['className' => OcorrenciaTiposTable::class];
        $this->OcorrenciaTipos = TableRegistry::getTableLocator()->get('OcorrenciaTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OcorrenciaTipos);

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

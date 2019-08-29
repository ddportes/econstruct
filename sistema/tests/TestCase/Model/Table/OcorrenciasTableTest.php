<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OcorrenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OcorrenciasTable Test Case
 */
class OcorrenciasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OcorrenciasTable
     */
    public $Ocorrencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ocorrencias',
        'app.OcorrenciaTipos',
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
        $config = TableRegistry::getTableLocator()->exists('Ocorrencias') ? [] : ['className' => OcorrenciasTable::class];
        $this->Ocorrencias = TableRegistry::getTableLocator()->get('Ocorrencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ocorrencias);

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

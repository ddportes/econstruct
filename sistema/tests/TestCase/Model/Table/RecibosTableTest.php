<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecibosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecibosTable Test Case
 */
class RecibosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecibosTable
     */
    public $Recibos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Recibos',
        'app.Equipes',
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
        $config = TableRegistry::getTableLocator()->exists('Recibos') ? [] : ['className' => RecibosTable::class];
        $this->Recibos = TableRegistry::getTableLocator()->get('Recibos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recibos);

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

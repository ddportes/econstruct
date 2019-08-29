<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecebimentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecebimentosTable Test Case
 */
class RecebimentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecebimentosTable
     */
    public $Recebimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Recebimentos',
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
        $config = TableRegistry::getTableLocator()->exists('Recebimentos') ? [] : ['className' => RecebimentosTable::class];
        $this->Recebimentos = TableRegistry::getTableLocator()->get('Recebimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recebimentos);

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

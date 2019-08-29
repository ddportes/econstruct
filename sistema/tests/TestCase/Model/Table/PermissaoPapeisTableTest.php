<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissaoPapeisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissaoPapeisTable Test Case
 */
class PermissaoPapeisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissaoPapeisTable
     */
    public $PermissaoPapeis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PermissaoPapeis',
        'app.Permissoes',
        'app.Papeis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissaoPapeis') ? [] : ['className' => PermissaoPapeisTable::class];
        $this->PermissaoPapeis = TableRegistry::getTableLocator()->get('PermissaoPapeis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissaoPapeis);

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

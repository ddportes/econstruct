<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserPapeisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserPapeisTable Test Case
 */
class UserPapeisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserPapeisTable
     */
    public $UserPapeis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserPapeis',
        'app.Useres',
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
        $config = TableRegistry::getTableLocator()->exists('UserPapeis') ? [] : ['className' => UserPapeisTable::class];
        $this->UserPapeis = TableRegistry::getTableLocator()->get('UserPapeis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserPapeis);

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

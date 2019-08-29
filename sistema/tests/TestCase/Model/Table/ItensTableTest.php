<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItensTable Test Case
 */
class ItensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItensTable
     */
    public $Itens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Itens',
        'app.Notas',
        'app.Fornecedores',
        'app.Produtos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Itens') ? [] : ['className' => ItensTable::class];
        $this->Itens = TableRegistry::getTableLocator()->get('Itens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Itens);

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

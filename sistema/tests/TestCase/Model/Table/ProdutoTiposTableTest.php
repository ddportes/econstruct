<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutoTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutoTiposTable Test Case
 */
class ProdutoTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutoTiposTable
     */
    public $ProdutoTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProdutoTipos',
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
        $config = TableRegistry::getTableLocator()->exists('ProdutoTipos') ? [] : ['className' => ProdutoTiposTable::class];
        $this->ProdutoTipos = TableRegistry::getTableLocator()->get('ProdutoTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdutoTipos);

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

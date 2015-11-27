<?php
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\CampanhasHomeCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\CampanhasHomeCell Test Case
 */
class CampanhasHomeCellTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMock('Cake\Network\Request');
        $this->response = $this->getMock('Cake\Network\Response');
        $this->CampanhasHome = new CampanhasHomeCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CampanhasHome);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

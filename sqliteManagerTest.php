<?php
include 'sqliteManager.php';

class StackTest extends PHPUnit_Framework_TestCase
{
    private $db;
    

    /*
    public function testPushAndPop()
    {
        $stack = array();
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
    */
    public function setUp()
    {
        $this->db = new sqliteManager('new');
    }
    public function testDBHsetup(){
        $return = $this->db->returnDBHissetVal();
        $this->assertTrue($return);
    }
    public function testAttributesSet()
    {
        //$db = new sqliteManager('new');
        
        $return = $this->db->setAttributes();
        $this->assertTrue($return);

    }
    public function testKeySet()
    {
        $return = $this->db->addKey('test key');
        $this->assertTrue($return);
    }
}
?>
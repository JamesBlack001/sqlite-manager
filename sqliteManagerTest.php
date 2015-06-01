<?php
include 'sqliteManager.php';

class StackTest extends PHPUnit_Framework_TestCase
{
    private $db;
    private $keyArray;

    /**
     * Sets up the framework for the test suite
     */
    public function setUp()
    {
        $this->db = new sqliteManager('new');
        $this->keyArray=[];
    }
    /**
     * tests dedicated function in sqliteManager, that returns True
     * if the db has been initialised properly
     * @returned Bool The returned value from calling returnDBHissetVal() on the dbhandler
     */
    public function testDBHsetup(){
        $returned = $this->db->returnDBHissetVal();
        $this->assertTrue($returned);
    }
    /**
     * tests dedicated function in sqliteManager, that returns True if the sqlite db has its attributes set
     * @returned [Bool] [The returned value from calling setAttributes() on the dbhandler]
     */
    public function testAttributesSet()
    {
        //$db = new sqliteManager('new');
        
        $returned = $this->db->setAttributes();
        $this->assertTrue($returned);

    }
    /**
     * [testKeySet tests that the method addKey returns a True. Addkey returns True if success, else false]
     * @returned [Bool] [The returned value from calling addKey() on the dbhandler]
     */
    public function testKeySet()
    {
        $returned = $this->db->addKey('test key');
        $this->assertTrue($returned);
    }
    /**
     * Tests that the keys added to the keyArray in the dbhandler is correctly set, by asserting the return of those values are the same as what was input.
     */
    public function testGetKeyArray()
    {
        //assign some values to the keyarray
        $this->db->addKey('hello');
        $this->db->addKey('name');

        //get the key set
        
        $this->keyArray = $this->db->getKeyArray();


        //test it matches the values
        $this->assertTrue('hello' == $this->keyArray[0]);
        $this->assertTrue('name' == $this->keyArray[1]);
        //$this->assertEquals();
    }

    public function testStringSetup()
    {
        //assign some values to the keyarray
        $this->db->addKey('hello');
        $this->db->addKey('name');

        //call the dbhandler method createString()
        $this->db->createString();

        //get the string value created in createString()
        $stmt = $this->db->getStatement();

        $this->assertTrue($stmt == 'CREATE TABLE IF NOT EXISTS new (hello,name)');
    }
    /**
     * Tests that the tableCreation runs successfully
     * @return [type] [description]
     */
    public function testTableSetup()
    {
        $this->db->addKey('message TEXT');
        $this->db->createString();

        $returned = $this->db->initiateTable();
        $this->assertTrue(0 === $returned);
    }


    public function tearDown()
    {
        //$this->db->dropTable('new');
    }
}
?>
<?php

namespace BharlesCabbage;

class CallThrowTest extends \PHPUnit\Framework\TestCase
{
    public function testSaldDefault()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad([]);
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('I like this salt.', $result['message']);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testSaldWithSalt()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad(
            [
                'salt' => 'salt',
            ]
        );
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('I have a feeling, that\'s something predetermined.', $result['message']);
        $this->assertEquals(false, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testSaldWithPassword()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad(
            [
                'pswd' => 'Abcd1234',
            ]
        );
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('I like this salt.', $result['message']);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testSaldWithAnniversary1()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad(
            [
                'pswd' => '19860706',
            ]
        );
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('Anniversary!', $result['message']);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testSaldWithAnniversary2()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad(
            [
                'pswd' => '76',
            ]
        );
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('Anniversary!', $result['message']);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testSaldWithAnniversary3()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad(
            [
                'pswd' => 'A.D.198676',
            ]
        );
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('Anniversary!', $result['message']);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testSaldWithAnniversary4()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad(
            [
                'pswd' => 'B.C.176',
            ]
        );
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('Anniversary!', $result['message']);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testSaldWithPasswordAndSalt()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->salad(
            [
                'pswd' => 'Abcd1234',
                'salt' => 'salt',
            ]
        );
        $this->assertArrayHasKey('result', $result);
        $this->assertEquals('I have a feeling, that\'s something predetermined.', $result['message']);
        $this->assertEquals(false, $result['status']);
        $this->assertEquals('call', $result['callthrow']);
    }
    public function testColdsalad()
    {
        $Helper = new Helper();
        $CallThrow = new CallThrow($Helper);

        $result = $CallThrow->coldsalad();
        $this->assertEquals('', $result['result']);
        $this->assertEquals('', $result['message']);
        $this->assertEquals(true, $result['status']);
        $this->assertEquals('index', $result['callthrow']);
    }
}

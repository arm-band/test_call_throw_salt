<?php

namespace BharlesCabbage;

class HelperTest extends \PHPUnit\Framework\TestCase
{
    public function testH1()
    {
        $Helper = new Helper();

        $this->assertEquals('I like this salt.', $Helper->_h('I like this salt.'));
    }
    public function testH2()
    {
        $Helper = new Helper();

        $this->assertEquals('I have a feeling, that&#039;s something predetermined.', $Helper->_h('I have a feeling, that\'s something predetermined.'));
    }
    public function testH3()
    {
        $Helper = new Helper();

        $this->assertEquals('!&quot;#$%&amp;&#039;()=~|`{+*}&lt;&gt;?_-^\@[;:],./\\', $Helper->_h('!"#$%&\'()=~|`{+*}<>?_-^\\@[;:],./\\'));
    }
}

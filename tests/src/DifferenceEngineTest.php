<?php

namespace BharlesCabbage;

class DifferenceEngineTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testMillIndex()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->mill(
                [
                    'result'    => '',
                    'message'   => '',
                    'status'    => true,
                    'callthrow' => 'index',
                ]
            )
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testMillCallDefault()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->mill(
                [
                    'result'    => '$2y$10$XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
                    'message'   => 'I like this salt.',
                    'status'    => true,
                    'callthrow' => 'call',
                ]
            )
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testMillCallAnniversary()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->mill(
                [
                    'result'    => '$2y$10$XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
                    'message'   => 'Anniversary!',
                    'status'    => true,
                    'callthrow' => 'call',
                ]
            )
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testMillCallWithSalt()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->mill(
                [
                    'result'    => '$2y$10$XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
                    'message'   => 'I have a feeling, that\'s something predetermined.',
                    'status'    => false,
                    'callthrow' => 'call',
                ]
            )
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testMillCallFailed()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->mill(
                [
                    'result'    => '$2y$10$XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
                    'message'   => 'I have a feeling, that\'s something predetermined.',
                    'status'    => false,
                    'callthrow' => 'hoge',
                ]
            )
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testAda400()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->ada(400)
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testAda403()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->ada(403)
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testAda404()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->ada(404)
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testAda405()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->ada(405)
        );
    }
    /**
     * @test
     * @runInSeparateProcess
     */
    public function testAda500()
    {
        $Helper = new Helper();
        $DifferenceEngine = new DifferenceEngine($Helper);

        $this->assertEquals(
            1,
            $DifferenceEngine->ada(500)
        );
    }
}

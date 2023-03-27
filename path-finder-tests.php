<?php

require_once 'path-finder.php';

use PHPUnit\Framework\TestCase;

class PathFinderTest extends TestCase
{
    private $map = array(
        array(true, true, true, true, true),
        array(true, false, false, false, true),
        array(true, true, true, true, true),
        array(true, true, true, true, true),
        array(true, true, true, true, true)
    );

    public function testValidStartAndEndVectors(): void
    {

        $this->assertEquals(6, shortestPath($this->map, [0, 1], [3, 2]));
        $this->assertEquals(8, shortestPath($this->map, [0, 0], [4, 4]));
    }

    public function testOutOfBoundsStartVector(): void
    {
        $this->expectExceptionMessage("Error: start_vector is out of bounds");
        shortestPath($this->map, [-1, 0], [4, 4]);
    }

    public function testOutOfBoundsEndVector(): void
    {
        $this->expectExceptionMessage("Error: end_vector is out of bounds");
        shortestPath($this->map, [1, 0], [5, 4]);
    }

    public function testNonNumericStartOrEndVector(): void
    {
        $this->expectExceptionMessage("Error: start_vector and end_vector values must be integers");
        shortestPath($this->map, ['a', 0], [5, 'c']);
    }

    public function testNoPathFound(): void
    {
        $map = [
            [true, true, true, true, true],
            [false, false, false, false, false],
            [true, true, true, true, true],
            [true, true, true, true, true],
            [true, true, true, true, true]
        ];
    
        $start = [0, 0];
        $end = [4, 4];
    
        $distance = shortestPath($map, $start, $end);
    
        $this->assertSame(-1, $distance);

    }
}
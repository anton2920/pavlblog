<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function testNum()
    {
        $array = [1,2,3];

        $this->assertEquals([1,22,3], $array);
    }
}


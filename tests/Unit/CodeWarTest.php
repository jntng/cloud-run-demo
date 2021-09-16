<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\User;
use phpDocumentor\Reflection\Types\Collection;
use Tests\TestCase;

class CodeWarTest extends TestCase
{
    /**
    1. 數字反轉，123 變 321 ， 107 變 701
    2. 連加，輸入 10 ，回傳 1 +2 +3 …..+10
    3. 平方連加，輸入10 ，回傳 1平方 + 2 平方+ 3 平方….+10平方
    4. 階乘，輸入 10 ，回傳 1*2*3*4 …..*10
     */


    /**
     * @dataProvider test_1_data
     */
    public function test_1_example($input, $expect)
    {
        $response = $this->get("/codewar/1/{$input}");
        $this->assertSame((int)($response->content()),$expect);
    }
    public function test_1_data(): array
    {
        return [
            [123,321],
            [107,701],
            [0,0],
            [1,1]
        ];
    }

    /**
     * @dataProvider test_2_data
     */
    public function test_2_example($input, $expect)
    {
        $response = $this->get("/codewar/2/{$input}");
        $this->assertSame((int)($response->content()),$expect);
    }
    public function test_2_data(): array
    {
        return [
            [10,55],
            [1,1],
            [2,3]
        ];
    }
    /**
    * @dataProvider test_3_data
    */
    public function test_3_example($input, $expect)
    {
        $response = $this->get("/codewar/3/{$input}");
        $this->assertSame((int)($response->content()),$expect);
    }
    public function test_3_data(): array
    {
        return [
            [1,1],
            [2,5]
        ];
    }
    /**
    * @dataProvider test_4_data
    */
    public function test_4_example($input, $expect)
    {
        $response = $this->get("/codewar/4/{$input}");
        $this->assertSame((int)($response->content()),$expect);
    }
    public function test_4_data(): array
    {
        return [
            [1,1],
            [2,2],
            [3,6]
        ];
    }

}

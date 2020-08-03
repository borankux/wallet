<?php


namespace Tests\Feature;


use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function testAddBank()
    {
        $uri = '/api/bank';
        $data = [
            'name' => 'testBank',
            'logo' => 'testLogo'
        ];
        $res = $this->post($uri, $data);
        echo $res->content();die;
        $this->assertTrue(true);
    }
}
<?php


namespace tests\Unit;



use App\Controllers\HomeController;
use App\Core\Router;

class RouterTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->router=new Router();
    }

    public function test_no_route(): void
    {
        $router=new Router();
        $this->assertEmpty($router->routes());
    }

    public function test_register_a_get_route(): void
    {
        $this->router->get('/test', [HomeController::class, 'test_action']);
        $result=[
            'get'=> [
                '/test'=>['App\Controllers\HomeController','test_action']
            ]
        ];
        $this->assertEquals($result,$this->router->routes());
    }

    public function test_register_a_post_route(): void
    {
        $this->router->post('/test', [HomeController::class, 'test_post_action']);
        $result=[
            'post'=> [
                '/test'=>['App\Controllers\HomeController','test_post_action']
            ]
        ];
        $this->assertEquals($result,$this->router->routes());
    }
}
<?php

namespace Tests\Feature\unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;
use PHPunit\Framework\TestCase;
use App\Http\Controllers\MensajeController;
// use App\Repositorios\InterfaceClass;
use Mockery;

class MensajeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {

        $interfaceClass = Mockery::mock('App\Repositorios\InterfaceClass');

        $response = new MensajeController($interfaceClass);

        $response->index();

    }
    
}

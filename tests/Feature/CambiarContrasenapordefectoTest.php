<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Egresado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CambiarContrasenapordefectoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */  //agregar esto a cada metodo para que lo considere como una prueba o sino anteponer el termino test_nombretumetodo al nombre del metodo

    public function ruta_test_example()
    {
          //Validar si la ruta para cambiar la contraseña por defecto existe
          $response = $this->post('/cambiarcontrasenapordefecto');
          $response->assertStatus(200);


    }
    /** @test */
    public function estado_test_example()
    {
        //Verificamos si un egresado no tiene contraseña por defecto
        $user=DB::table('users')
        ->select('estadocontrasena')
        ->where('email','=','cruzjean52@gmail.com')
        ->get();
       foreach($user as $users){
        $user_estado=$users->estadocontrasena;
       }

        $this->assertSame('modificado',$user_estado);

    }
    
}

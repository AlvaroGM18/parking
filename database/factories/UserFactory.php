<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre= UserFactory::quitar_tildes(fake()->firstName);
        $apellidos = UserFactory::quitar_tildes(fake()->colorName);
        $domcorreo = fake()->freeEmailDomain();
        $emailaddress = strtolower($nombre . "." . $apellidos . "@" . $domcorreo);
        return [
            'name' => $nombre . " " . $apellidos,
            'email' => $emailaddress,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'dni'=> $this->generarDNI(),
            'telefono'=> $this->generarTelefono(),
            'direccion'=> "C/calleFalsa",
            'tarifa'=> $this->getNumber()
        ];
    }
    function generarTelefono() {
        $telefono = '';
        $repetido = true;
        while ($repetido) {
            $telefono = '6'; // Empieza con 6 porque todos los números de teléfono móvil en España empiezan con 6
            for ($i = 0; $i < 8; $i++) {
                $telefono .= mt_rand(0, 9); // Genera un número aleatorio del 0 al 9 y lo añade al número de teléfono
            }
            $repetido = DB::table('users')->where('telefono', $telefono)->exists(); // Comprueba si el número de teléfono ya existe en la base de datos
        }
        return $telefono;
    }
    function getNumber() {
        return rand(1, 2);
    }

    function generarDNI() {
        // Genera una letra aleatoria para el DNI
        $letraDNI = chr(rand(65, 90));

        // Genera un número aleatorio de 7 cifras para el DNI
        $numeroDNI = str_pad(rand(1, 9999999), 8, '0', STR_PAD_LEFT);

        // Concatena la letra y el número para formar el DNI completo
        $dniCompleto = $numeroDNI . $letraDNI  ;

        // Verifica si el DNI ya existe en la base de datos
        while (DB::table('users')->where('dni', $dniCompleto)->exists()) {
            // Si el DNI ya existe, genera otro DNI y verifica de nuevo
            $letraDNI = chr(rand(65, 90));
            $numeroDNI = str_pad(rand(1, 9999999), 7, '0', STR_PAD_LEFT);
            $dniCompleto = $numeroDNI . $letraDNI ;
        }

        // Retorna el DNI único generado
        return $dniCompleto;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    private function quitar_tildes($cadena)
    {
        $cadBuscar = array("á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú");
        $cadPoner = array("a", "A", "e", "E", "i", "I", "o", "O", "u", "U");
        $cadena = str_replace ($cadBuscar, $cadPoner, $cadena);
        return $cadena;
}
}

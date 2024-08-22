<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use App\Models\User;



require 'vendor/autoload.php';  // Certifique-se de que o autoload do Composer está incluído

use Faker\Factory as Faker;


class CreateVacinaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */

    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel');
        });
    }



    public function testCrudVacina()
    {
        // Cria um registro de vacina no banco de dados
        $vacina = \App\Models\Vacina::create([
            'location' => 'São Gonçalo',
            'date' => '2024-10-10',
            'vaccine' => 'Covac Teste 123',
            'source_url' => 'http://teste123.com',
            'total_vaccinations' => 1500,
            'people_vaccinated' => 1200,
            'people_fully_vaccinated' => 1000,
            'total_boosters' => 300,
        ]);
    
        $this->browse(function (Browser $browser) use ($vacina) {
            // Acesse a página de listagem de vacinas
            $browser->visit('/vacinas')
                    ->assertSee($vacina->location)
                    ->pause(1000) // Pausa de 1 segundo
    
                    // Edição do registro
                    ->clickLink('Editar')  // Usa o texto do link para clicar no botão de edição
                    ->pause(1000) // Pausa de 1 segundo
                    ->typeSlowly('location', 'Rio de Janeiro')
                    ->pause(1000) // Pausa de 1 segundo
                    ->press('Atualizar')  // O botão de submissão é "Atualizar"
                    ->pause(1000) // Pausa de 1 segundo
                    ->assertPathIs('/vacinas')
                    ->assertSee('Rio de Janeiro')
                    ->pause(1000) // Pausa de 1 segundo
                    ->visit('/vacinas')
                    ->pause(1000) // Pausa de 1 segundo
                    
                    // Deleção do registro
                    ->press('Excluir')  // Assumindo que o botão "Excluir" é visível e acessível
                    ->pause(1000) // Pausa de 1 segundo
                    ->waitForDialog()  // Aguarda o alerta de confirmação ser exibido
                    ->pause(1000) // Pausa de 1 segundo
                    ->acceptDialog()  // Aceita o diálogo de confirmação
                    ->pause(1000) // Pausa de 1 segundo
                    ->assertDontSee('Rio de Janeiro');
        });
    }
    






}

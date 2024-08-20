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

     public function testExample(): void{
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }





    public function testCreateVacina(){
        $this->browse(function (Browser $browser) {

            // Cria uma instância do gerador de dados Faker
            $faker = Faker::create();
            $location = $faker->city;

            $vaccine = 'Covac Teste ' . random_int(1, 1000);
            $sourceUrl = 'http://teste' . random_int(1, 1000) . '.com';
            $totalVaccinations = random_int(1000, 2000);
            $peopleVaccinated = random_int(800, $totalVaccinations);
            $peopleFullyVaccinated = random_int(600, $peopleVaccinated);
            $totalBoosters = random_int(200, 400);
    
            $browser->loginAs(User::find(1))  // Certifique-se de que o ID do usuário é válido
                    ->visit('/vacinas/create')
                    ->pause(500)
                    ->waitFor('input[name="location"]')  // Aguarda o campo location estar disponível
                    ->pause(500)
                    ->clear('input[name="location"]')  // Limpa o valor existente
                    ->keys('input[name="location"]', $location)
                    ->pause(500)
                    ->type('date', '10/10/2024')
                    ->pause(500)
                    ->type('vaccine', $vaccine)
                    ->type('source_url', $sourceUrl)
                    ->type('total_vaccinations', $totalVaccinations)
                    ->type('people_vaccinated', $peopleVaccinated)
                    ->type('people_fully_vaccinated', $peopleFullyVaccinated)
                    ->type('total_boosters', $totalBoosters)
                    ->pause(500)
                    ->press('Enviar')
                    ->pause(500)
                    ->assertPathIs('/vacinas')  // Verifica se a URL é a correta após o redirecionamento
                    ->pause(500);
        });
    }
    


























    public function testEditVacina(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/vacinas/32/edit')  // Substitua '1' pelo ID real da vacina a ser editada
                ->pause(500)
                ->typeSlowly('location', 'Viporanga do norte')
                ->pause(500)
                ->typeSlowly('date', '12/12/2024')
                ->pause(500)
                ->typeSlowly('vaccine', 'Covac Editado')
                ->typeSlowly('source_url', 'http://editado.com')
                ->typeSlowly('total_vaccinations', '1500')
                ->type('people_vaccinated', '1000')
                ->type('people_fully_vaccinated', '800')
                ->type('total_boosters', '300')
                ->pause(500)
                ->press('Atualizar')  // Botão para submeter o formulário de edição
                ->pause(500)
                ->assertPathIs('/vacinas')  // Verifica se a URL é a correta após o redirecionamento
                ->pause(500);

        });
    }


    public function testDeleteVacina(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/vacinas')  // Visitando a página onde a vacina é listada
                ->pause(500)
                ->press('Excluir')  // Substitua '1' pelo ID correto do botão de deletar ou use um atributo real
                ->pause(500);
        });
    }

}

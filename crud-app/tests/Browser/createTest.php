<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Contact;

class createTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function test_Rodando()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Contatos')
                    ->assertSee('Name');
        });
    }

    public function test_Deveria_criar_um_contato()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Contatos')
                    ->clickLink('Create')
                    ->type('first_name', 'carlos')
                    ->type('datanasc', '1111-02-20')
                    ->type('last_name', 'silva')
                    ->type('email', 'carlossilva@email.com')
                    ->type('city', 'Aracity')
                    ->type('country', 'evva')
                    ->type('job_title', 'vagabundo')
                    ->type('description', 'nao sei na')
                    ->type('anotrab', '5')
                    ->press('[type=submit]')
                    ->assertSee('Contato Salvo')
                    ->pause(1000);
        });
    }
    public function test_Deveria_editar_um_contato(){
        //$cont =  Contact::all()->random()->get('id');
        $this->browse(function (Browser $browser){
            $browser->visit('/contacts/4/edit')
                ->type('first_name', 'lindalva')
                ->type('city', 'Igarassu')
                ->press('[type=submit]')
                ->assertSee('Contato Modificado');

        });
    }

    public function test_Deveria_tentar_cadastrar_com_o_campo_job_title_vazio(){
        //$faker = Faker\Factory::create();

        $this->browse( function ( Browser $browser){
            $browser->visit('/')
                    ->clickLink('Contatos')
                    ->clickLink('Create')
                    ->type('first_name', 'caroline')
                    ->type('datanasc', '2010-02-23')
                    ->type('last_name', 'nogueira')
                    ->type('email', 'nog@email..com')
                    ->type('city', 'Igaraselva')
                    ->type('country', 'Aquiiiii')
                    ->type('job_title', '')
                    ->type('description', 'vendedora de brisadeiro')
                    ->type('anotrab', '2')
                    ->press('[type=submit]')
                    ->assertSee('O campo job title é obrigatório.');
        });
    }
    public function test_Deveria_tentar_cadastrar_com_o_campo_anotrab_como_string(){
        //$faker = Faker\Factory::create();

        $this->browse( function ( Browser $browser){
            $browser->visit('/')
                    ->clickLink('Contatos')
                    ->clickLink('Create')
                    ->type('first_name', 'lindovalda')
                    ->type('datanasc', '2010-02-23')
                    ->type('last_name', 'lima')
                    ->type('email', 'ldvlg@email.com')
                    ->type('city', 'Igaraselva')
                    ->type('country', 'Aquiiiii')
                    ->type('job_title', 'cobradora')
                    ->type('description', 'Abreu Abreu')
                    ->type('anotrab', 'acerola')
                    ->press('[type=submit]')
                    ->pause(1000)
                    ->assertSee('O campo anotrab deve ser um número.');
        });
    }

    public function test_Deveria_tentar_cadastrar_com_o_campo_description_vazio(){
        //$faker = Faker\Factory::create();

        $this->browse( function ( Browser $browser){
            $browser->visit('/')
                    ->clickLink('Contatos')
                    ->clickLink('Create')
                    ->type('first_name', 'carol')
                    ->type('datanasc', '2010-02-23')
                    ->type('last_name', 'nogueira')
                    ->type('email', 'nog@email.com')
                    ->type('city', 'Paulista')
                    ->type('country', 'La')
                    ->type('job_title', 'DJ')
                    ->type('description', '')
                    ->type('anotrab', '3')
                    ->press('[type=submit]')
                    ->assertSee('O campo description é obrigatório quando job title / description está presente.');
        });
    }

}

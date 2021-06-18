<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jorge Bayter',
            'email' => 'doctorbayter@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Jeff Cote',
            'email' => 'hello@jeffcote.me',
            'password' => bcrypt('01020304'),
        ]);

        //Lideres

        $user = User::create([
            'name' => 'Jackie',
            'email' => 'jackie@adn-empresarial.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Dianan Rodriguez',
            'email' => 'dianarod.can@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Aberruncio',
            'email' => 'aberruncio@gmail.com',
            'password' => bcrypt('01020304'),
        ]);
        
        $user = User::create([
            'name' => 'Ceci Bracho',
            'email' => 'cecibracho@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Anca Stanciou',
            'email' => 'ancuta_stancioiu@yahoo.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Claudia Carlomagno',
            'email' => 'claudiacarlomagno@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Shanna Patiño',
            'email' => 'shanis18@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Carrizal',
            'email' => 'carrizalcity1978@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Osvaldo De Britos',
            'email' => 'osvaldodebritos@hotmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Edith Marcozzi',
            'email' => 'edithmarcozzi75@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Tatiana Patiño Ferrin',
            'email' => 'tata_0825@hotmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user = User::create([
            'name' => 'Mary Chuy De Vitela',
            'email' => 'netcelaya@gmail.com',
            'password' => bcrypt('01020304'),
        ]);
        
    

        // Grupo Selecto

        $user = User::create([
            'name' => 'Sandra Bustamante Valdebenito',
            'email' => 'sandra.bustamante.v@gmail.com',
            'password' => bcrypt('Avatar2010'),
        ]);

        $user = User::create([
            'name' => 'Mariella Francesca Baeza Garcia',
            'email' => 'm.bgariella28@gmail.com',
            'password' => bcrypt('hijosbellos4'),
        ]);

        $user = User::create([
            'name' => 'Martha Czielke',
            'email' => 'marthaczielke@gmail.com',
            'password' => bcrypt('Miladin731'),
        ]);

        $user = User::create([
            'name' => 'Virginia Lopez',
            'email' => 'virginialop27@gmail.com',
            'password' => bcrypt('8801Isa$$'),
        ]);

        $user = User::create([
            'name' => 'Agustina G Siri',
            'email' => 'fanin123@yahoo.com',
            'password' => bcrypt('Jossy123'),
        ]);

        $user = User::create([
            'name' => 'Ana Victoria Paz',
            'email' => 'anavictoriapaz17@gmail.com',
            'password' => bcrypt('anavictoria1770'),
        ]);

        $user = User::create([
            'name' => 'Alondra montes Arteaga',
            'email' => 'alondrama18@gmail.com',
            'password' => bcrypt('Lucas0709'),
        ]);

        $user = User::create([
            'name' => 'Gisela Díaz Hernández',
            'email' => 'giseladiaz201560@gmail.com',
            'password' => bcrypt('Lorena2011$-'),
        ]);

        $user = User::create([
            'name' => 'Sara Ibeth Fayad Castaño',
            'email' => 'saraifayad@hotmail.com',
            'password' => bcrypt('Camila02'),
        ]);

        $user = User::create([
            'name' => 'Cintya Morales',
            'email' => 'cintyamorales93@gmail.com',
            'password' => bcrypt('Freshtruck399#'),
        ]);

        $user = User::create([
            'name' => 'Maria del socorro de la cruz Martínez',
            'email' => 'cococruz2308@hotmail.com',
            'password' => bcrypt('coco2308'),
        ]);

        $user = User::create([
            'name' => 'Janet N Chávez',
            'email' => 'chocasorulla@yahoo.com',
            'password' => bcrypt('Janito88'),
        ]);

        $user = User::create([
            'name' => 'René Ortiz',
            'email' => 'rherna73@gmail.com',
            'password' => bcrypt('Amparo65!'),
        ]);

        $user = User::create([
            'name' => 'Rosa H Gonzalez Moreno',
            'email' => 'rosah71@gmail.com',
            'password' => bcrypt('Agua1234!'),
        ]);

        $user = User::create([
            'name' => 'Damaris Rivera',
            'email' => 'roswell_ufo_center@hotmail.com',
            'password' => bcrypt('Sahori2128'),
        ]);

        $user = User::create([
            'name' => 'Lucia  Ines Mondragon Perez',
            'email' => 'luciainesmondragon@gmail.com',
            'password' => bcrypt('Alaska'),
        ]);

        $user = User::create([
            'name' => 'Ruby Orozco sarasti',
            'email' => 'ru.b.yorozco@hotmail.com',
            'password' => bcrypt('Ruby1966'),
        ]);

        //Clientes
        $user = User::create([
            'name' => 'Catalina Cárdenas Cifuentes',
            'email' => 'cata.carci16@gmail.com',
            'password' => bcrypt('13Diciembre96'),
        ]);


        

    }
}

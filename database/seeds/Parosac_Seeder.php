<?php

use Illuminate\Database\Seeder;

class Parosac_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente')->insert([
            ["ruc" => "20555645661","razon_social"=>"H2O CONTRATISTAS GENERALES SAC","representante"=>" H2o Contratistas Generales Sociedad ","usuario"=>"h2o","clave"=>'123'],
        ]);

        DB::table('comensal')->insert([
            ["cliente_id"=>1,"apellido_paterno" => "SANCHEZ","apellido_materno"=>"ASCORBE","nombres"=>"Oliver Adrian","numero_documento"=>"46041769","huella1"=>"Rk1SACAyMAABTAAcAAAAAAEEAUoAxQDFAQAAAAAlQPUAgEYAgOoAa0cAQOoAX50AgOQAv5MAgNoBBoIAgNIA1YwAgMEAk6AAQMABGHgAgLoA5ocAQKoBOxkAQJwAtqEAQJMA2IsAQI8A3X4AgI0BAXEAgIcBOQwAgIIAxgUAQHsA/SEAQHIAMAUAgG4AOGMAgG4BDBkAQGwAJGMAQGkAQggAgGcBKg8AgGYA3X0AgGMBCiUAQFsAp3AAQFoBOgsAgFcBAH8AQFYBECgAQEoBGB4AgEkAc2wAQDsA8noAgDgAqRcAQDUAgRYAQC8BHiEAQBwBIzsAQBYBJz0AAE4cJABOAyQAMA4EkQYwjQCWEgUThYaICYaFBAGDhgABhIOBAAkGggGCiAqCgQeHCQGFAIYDgYEIBAMjABCYAMgAAQAAAAAAAAAAAAAAAFA=","url_foto"=>"https://lh5.googleusercontent.com/-eF7qwePrDeU/AAAAAAAAAAI/AAAAAAAAAB0/6ci6wPo7dF0/photo.jpg"],
            ["cliente_id"=>1,"apellido_paterno" => "ESQUIVEL","apellido_materno"=>"CUENCA","nombres"=>"Francis Paul","numero_documento"=>"46557081","huella1"=>"Rk1SACAyMAABmgAcAAAAAAEEAUoAxQDFAQAAAAAygPkAXkYAQOUBM0YAQOMASKMAQOEAtz0AQOABN0oAQN0AjUMAgNEAzEMAQNAAgJ0AQM0BNkYAQMgAT1QAgMUAt1EAgMQBIzkAQMIBOU0AQMIAKFQAgL8A4YsAQLkBLT0AQK8AMmEAgK4A/Y8AQK4Ay3YAQK4ATAAAgKsAo2wAQKgA8IIAQKgAbAIAgKUBDogAgJ4A+H4AQJoBPA8AQJYAbW0AQJABPBcAQIkAixYAQIQBPRYAQIIANxAAQIIA+nsAQH8BESAAQH4A7yAAQH0BORcAgHoAxx0AgGgBNxIAQGcBESAAQGMAnhwAQGIA/XYAgF0BOA4AQFcAwXYAQFABDBwAQFABMxYAQEwBOgAAQDYA6RwAgDEAynoAQCwBKSAAQBoBJjUAQBYBKDwAAE4cJABOAyQAMJCImBE4hoaLhhIPiQKBB4qBBwABiQQEggYDAQMCBAkCAwUGAACBggKCgoKGg4MEAQMjABC6ANYAAQAAAAAAAAAAAAAAAFA=","url_foto"=>"https://media.licdn.com/mpr/mpr/shrinknp_200_200/p/8/005/030/0c6/0c34011.jpg"],
        ]);

        DB::table('plato')->insert([
            ["nombre"=>"Arroz con Pato","url_foto"=>"http://comidasperuanas.net/wp-content/uploads/2015/08/Arroz-con-Pato-730x430.jpg"],
            ["nombre"=>"Cabrito","url_foto"=>"http://rutamoche.net/photos/trujillo-gastronomia-cabrito.jpg"],
            ["nombre"=>"Ceviche","url_foto"=>"http://2.bp.blogspot.com/-PVTMfOMTMG0/VG0BO_a5dCI/AAAAAAAAfmQ/iCjIfooDHcM/s1600/ceviche-gambas.jpg"],
            ["nombre"=>"Causa Limeña","url_foto"=>"http://www.telemundo.com/sites/nbcutelemundo/files/sites/nbcutelemundo/files/images/article/2012/11/08/causa_4.jpg"],
            ["nombre"=>"Papá a la Huancaína","url_foto"=>"http://0.tqn.com/d/comidaperuana/1/0/q/C/-/-/papa-a-la-huancaina-Peru-mucho-gusto.JPG"],
            ["nombre"=>"Lomo Saltado","url_foto"=>"http://comidasperuanas.net/wp-content/uploads/2015/08/Lomo-Saltado-730x430.jpg"],
        ]);

        DB::table('menu')->insert([
            ["cliente_id"=>1,"fecha" => "22/05/2017","plato_id"=>1],
            ["cliente_id"=>1,"fecha" => "22/05/2017","plato_id"=>2],
            ["cliente_id"=>1,"fecha" => "22/05/2017","plato_id"=>3],
            ["cliente_id"=>1,"fecha" => "22/05/2017","plato_id"=>4],
            ["cliente_id"=>1,"fecha" => "22/05/2017","plato_id"=>5],
            ["cliente_id"=>1,"fecha" => "22/05/2017","plato_id"=>6],
        ]);

    }
}

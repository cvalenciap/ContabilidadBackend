<?php 

require_once 'vendor/autoload.php';
$app= new \Slim\Slim();

//Middleware
function mymiddleware(){

   echo "Hola soy tu middleware";

}



//Example one
$app->get("/hola/:nombre",function($nombre) use ($app){

 echo "Hola".$nombre;
 var_dump($app->request->params("hola"));

});

//Example two
$app->get("/prueba(/:uno(/:dos))",'mymiddleware',function($uno=NULL,$dos=NULL){

    echo $uno."<br/>";
    echo $dos."<br/>";


})->conditions(array(
 "uno"=> "[a-zA-Z]*",
 "dos"=>"[0-9]*"

));

//api group
$uri="/slim/index.php/api/ejemplo/";

$app->group("/api",function() use ($app,$uri){

    $app->group("/ejemplo",function() use ($app,$uri){



        $app->get("/hola/:nombre",function($nombre){

            echo "Hola".$nombre;
            
           
           })->name("hola");
        
        $app->get("/mandame-a-hola",function() use ($app,$uri){

            $app->redirect($app->urlFor("hola",array(
                 "nombre" =>"Nick Alvi Ganoza"

            )));


        });

    });




});


$app->run();
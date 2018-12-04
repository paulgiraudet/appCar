<?php

//display detailsVue with specific controller
//do the modify link


declare(strict_types = 1);

// On enregistre notre autoload.
function chargerClasse($classname)
{
    if(file_exists('../models/'. $classname.'.php'))
    {
        require '../models/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');


$db = Database::DB();

$manager = new VehicleManager($db);

if (isset($_GET['delete'], $_GET['id'])) {
    if($_GET['delete']){
        $id = (int) $_GET['id'];
        $vehicle = $manager->getVehicle($id);
        $manager->delete($vehicle);
        header('Location: index.php');
    }
}

if (isset($_POST['newVehicle'])) {
    $name = htmlspecialchars($_POST['name']);
    $brand = htmlspecialchars($_POST['brand']);
    $color = htmlspecialchars($_POST['color']);
    $wheelNumber = (int) $_POST['wheelNumber'];
    $type = $_POST['type'];
    $doorNumber = (int) $_POST['doorNumber'];
    $maxSpeed = (int) $_POST['maxSpeed'];
    $maxHeight = (int) $_POST['maxHeight'];

    if ($type == "Car") {
        $vehicle = new Car ([
            "name" => $name,
            "brand" => $brand,
            "color" => $color,
            "wheelNumber" => $wheelNumber,
            "doorNumber" => $doorNumber
        ]);  
        $manager->add($vehicle);
    }
    elseif ($type == "Motorbike") {
        $vehicle = new Motorbike ([
            "name" => $name,
            "brand" => $brand,
            "color" => $color,
            "wheelNumber" => $wheelNumber,
            "maxSpeed" => $maxSpeed
        ]);
        $manager->add($vehicle);
    }
    elseif ($type == "Truck") {
        $vehicle = new Truck ([
            "name" => $name,
            "brand" => $brand,
            "color" => $color,
            "wheelNumber" => $wheelNumber,
            "doorNumber" => $doorNumber,
            "maxHeight" => $maxHeight
        ]);
        $manager->add($vehicle);
    }
    else{
        echo "Formulaire incorrect";
    }
}


$vehicles = $manager->getVehicles();


include "../views/indexVue.php";
 ?>

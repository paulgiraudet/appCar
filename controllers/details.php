<?php


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

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $vehicle = $manager->getVehicle($id);
}
else{
    header('Location: index.php');
    exit();
}

if (isset($_POST['newColor'])) {
    if (isset($_POST['color']) && !empty($_POST['color'])) {
        $color = htmlspecialchars($_POST['color']);
        $vehicle->hydrate([
            "color" => $color
            ]);
            $updateVehicle = $manager->update($vehicle);
            header('Location: ?id=' . $vehicle->getId());
        }
}

include "../views/detailVue.php";

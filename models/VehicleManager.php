<?php

class VehicleManager
{
    private $_db;


    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */ 
    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

    /**
     * List all vehicles
     *
     * @return array $arrayOfVehicles
     */
    public function getVehicles()
    {
        // On déclare un tableau vide
        $arrayOfVehicles = [];

        $query = $this->getDb()->query('SELECT * FROM vehicles ORDER BY name');
        $dataVehicles = $query->fetchAll(PDO::FETCH_ASSOC);

        // A chaque tour, on crée un nouvel objet qu'on stock dans notre tableau $arrayOfVehicles
        foreach ($dataVehicles as $dataVehicle) {
            switch ($dataVehicle['type'])
            {
              case 'car': $arrayOfVehicles[] = new Car($dataVehicle); break;
              case 'truck': $arrayOfVehicles[] = new Truck($dataVehicle); break;
              case 'motorbike': $arrayOfVehicles[] = new Motorbike($dataVehicle); break;
            }
        }

        // On renvoie le tableau sur lequel on pourra boucler pour lister tous les personnages
        return $arrayOfVehicles;
    }

    /**
     * Get one vehicle by id or name
     *
     * @param $info
     * @return Character 
     */
    public function getVehicle($info)
    {
        // get by name
        if (is_string($info))
        {
            $query = $this->getDb()->prepare('SELECT * FROM vehicles WHERE name = :name');
            $query->bindValue('name', $info, PDO::PARAM_STR);
            $query->execute();
        }
        // get by id
        elseif (is_int($info))
        {
            $query = $this->getDb()->prepare('SELECT * FROM vehicles WHERE id = :id');
            $query->bindValue('id', $info, PDO::PARAM_INT);
            $query->execute();
        }

        // $dataVehicle est un tableau associatif contenant les informations d'un vehicle
        $dataVehicle = $query->fetch(PDO::FETCH_ASSOC);

        // On crée un nouvel objet grâce au tableau associatif $dataVehicle, et on le retourne
        switch ($dataVehicle['type'])
        {
          case 'car': $vehicle = new Car($dataVehicle); break;
          case 'truck': $vehicle = new Truck($dataVehicle); break;
          case 'motorbike': $vehicle = new Motorbike($dataVehicle); break;
        }
        return $vehicle;
    }

    /**
     * Add particular vehicle into DB
     *
     * @param [type] $vehicle
     * @return void
     */
    public function add($vehicle)
    {
        $query = $this->getDb()->prepare('INSERT INTO vehicles(name, brand, color, wheelNumber, type, doorNumber, maxSpeed, maxHeight) VALUES (:name, :brand, :color, :wheelNumber, :type, :doorNumber, :maxSpeed, :maxHeight)');
        $query->bindValue('name', $vehicle->getName(), PDO::PARAM_STR);
        $query->bindValue('brand', $vehicle->getBrand(), PDO::PARAM_STR);
        $query->bindValue('color', $vehicle->getColor(), PDO::PARAM_STR);
        $query->bindValue('wheelNumber', $vehicle->getWheelNumber(), PDO::PARAM_INT);
        $query->bindValue('type', $vehicle->getType(), PDO::PARAM_STR);

        if ($vehicle->getType() == 'car') {
            $query->bindValue('doorNumber', $vehicle->getDoorNumber(), PDO::PARAM_INT);
            $query->bindValue('maxSpeed', NULL);
            $query->bindValue('maxHeight', NULL);
        }
        elseif ($vehicle->getType() == 'truck') {
            $query->bindValue('doorNumber', $vehicle->getDoorNumber(), PDO::PARAM_INT);
            $query->bindValue('maxSpeed', NULL);
            $query->bindValue('maxHeight', $vehicle->getMaxHeight(), PDO::PARAM_INT);
        }
        elseif ($vehicle->getType() == 'motorbike') {
            $query->bindValue('doorNumber', NULL);
            $query->bindValue('maxSpeed', $vehicle->getMaxSpeed(), PDO::PARAM_INT);
            $query->bindValue('maxHeight', NULL);
        }

        $query->execute();

        // On récupère le dernier ID inséré en base de données
        $id = $this->getDb()->lastInsertId();
        // Et on hydrate notre objet pour lui ajouter son ID
        $vehicle->hydrate([
            "id" => $id
        ]);
    }

    /**
     * Delete vehicle from DB
     *
     * @param [type] $vehicle
     */
    public function delete($vehicle)
    {
        $query = $this->getDb()->prepare('DELETE FROM vehicles WHERE id = :id');
        $query->bindValue('id', $vehicle->getId(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Update vehicle's data 
     *
     * @param [type] $vehicle
     */
    public function update($vehicle)
    {
        $query = $this->getDb()->prepare('UPDATE vehicles SET color = :color WHERE id = :id');
        $query->bindValue('color', $vehicle->getColor(), PDO::PARAM_STR);
        $query->bindValue('id', $vehicle->getId(), PDO::PARAM_INT);
        $query->execute();
    }


}
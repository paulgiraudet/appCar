<?php
  include("template/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      
      <ol>
        
      <?php
      foreach ($vehicles as $vehicle) {
      ?>

        <li> <?php echo $vehicle->getName(); ?> / <a href="details.php?id=<?php echo $vehicle->getId();?>">Détails</a> / <a href="details.php?modify=true&amp;id=<?php echo $vehicle->getId(); ?>">Modifier</a> / <a href="index.php?delete=true&amp;id=<?php echo $vehicle->getId();?>">Supprimer</a></li>
        
        <?php
      }
      ?>
      </ol>
    </div>
    <div class="col-md-6">
        <form method="post" action="">
          <div class="form-group">
            <label for="name" class="col-md-6 col-form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom" required>
          </div>
          <div class="form-group">
            <label for="brand" class="col-md-6 col-form-label">Marque</label>
            <input type="text" name="brand" id="brand" class="form-control" placeholder="Marque" required>
          </div>
          <div class="form-group">
            <label for="color" class="col-md-6 col-form-label">Couleur</label>
            <input type="text" name="color" id="color" class="form-control" placeholder="Couleur" required>
          </div>
          <div class="form-group">
            <label for="wheelNumber" class="col-md-6 col-form-label">Nombre de roues</label>
            <input type="number" name="wheelNumber" id="wheelNumber" class="form-control" min="2" max="12" placeholder="Nombre de roues" required>
          </div>
          <label class="mt-2" for="type">Type:</label>
          <select name="type" id="type">
            <option value="Car" selected>Voiture</option>
            <option value="Motorbike">Moto</option>
            <option value="Truck">Camion</option>
          </select>
          <div class="form-group">
            <label for="doorNumber" class="col-md-6 col-form-label">Nombre de portes</label>
            <input type="number" name="doorNumber" id="doorNumber" class="form-control" min="0" max="5" placeholder="Nombre de portes" required>
          </div>
          <div class="form-group">
            <label for="maxSpeed" class="col-md-6 col-form-label">Vitesse maximale</label>
            <input type="number" name="maxSpeed" id="maxSpeed" class="form-control" min="0" max="300" placeholder="Vitesse max." required>
          </div>
          <div class="form-group">
            <label for="maxHeight" class="col-md-6 col-form-label">Hauteur maximale (cm)</label>
            <input type="number" name="maxHeight" id="maxHeight" class="form-control" min="100" max="600" placeholder="Hauteur max." required>
          </div>
          <div class="form-group row">
            <div class="col-6">
              <button type="submit" name="newVehicle" class="btn btn-primary">Ajouter</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>  

<?php
   include("template/footer.php")
  ?>

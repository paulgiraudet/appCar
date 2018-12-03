<?php
  include("template/header.php");

  ?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      
      <h2><?= $vehicle->getName(); ?></h2>
      <p>Marque : <?= $vehicle->getBrand(); ?></p>
      <p>Couleur : <?= $vehicle->getColor(); ?></p>
      <p>Nombre de roues : <?= $vehicle->getWheelNumber(); ?></p>
      
      <?php
        switch($vehicle->getType())
        {
          case 'car': 
          ?>
            <p>Nombre de portes : <?= $vehicle->getDoorNumber(); ?></p>
            <?php
            break;
            case 'truck': 
            ?>
            <p>Nombre de portes : <?= $vehicle->getDoorNumber(); ?>
            <p>Hauteur maximale : <?= $vehicle->getMaxHeight(); ?></p>
            <?php
            break;
            case 'motorbike': 
            ?>
            <p>Vitesse maximale : <?= $vehicle->getMaxSpeed(); ?></p>
            <?php                    
            break;
          }
          ?>
        <br>
        <?php
        if(!isset($_GET['modify'])){
        ?>
          <a href="details.php?modify=true&amp;id=<?php echo $vehicle->getId(); ?>">Modifier</a><br>
        <?php
        }
        ?>
        <a href="index.php?delete=true&amp;id=<?php echo $vehicle->getId();?>">Supprimer</a><br>
        <a href="index.php" class="mt-5">Retour</a>
      </div>
      <?php
        if (isset($_GET['modify'])) {
          ?>
          <div class="col-md-6">
            <form method="post" action="">
              <div class="form-group">
                <label for="color" class="col-md-6 col-form-label">Nouvelle couleur</label>
                <input type="text" name="color" id="color" class="form-control" placeholder="Nouvelle couleur" required>
              </div>
              <div class="form-group row">
                <div class="col-6">
                  <button type="submit" name="newColor" class="btn btn-primary">Changer la couleur</button>
                </div>
              </div>
            </form>
          </div>
          <?php
        }
      ?>
    </div>
  </div>
<?php
   include("template/footer.php")
   ?>

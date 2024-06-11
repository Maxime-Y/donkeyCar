<!DOCTYPE html>
<html lang="fr">

<html>

<body class="vehiclePage">
    <div class="vehiclePage1">
        <h1>QUEL VÉHICULE SOUHAITEZ-VOUS CONDUIRE ?</h1>
    </div>

    <!-- Modal pour les détails du véhicule -->
    <div class="modal fade modal-vehicle" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vehicleModalLabel">Détails du véhicule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Le contenu du modal sera injecté ici via JavaScript -->
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary">Réserver ce véhicule</a>
                </div>
            </div>
        </div>
    </div>

    <div class="vehiclePage2">
        <div class="btn-group gap-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Trier par
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Popularité</a></li>
                <li><a class="dropdown-item" href="#">Prix du plus bas au plus élevé</a></li>
                <li><a class="dropdown-item" href="#">Prix du plus élevé au plus bas</a></li>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Type de véhicule
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Berline</a></li>
                <li><a class="dropdown-item" href="#">SUV</a></li>
                <li><a class="dropdown-item" href="#">Coupé</a></li>
                <li><a class="dropdown-item" href="#">Cabriolet</a></li>
                <li><a class="dropdown-item" href="#">Voiture familiale</a></li>
                <li><a class="dropdown-item" href="#">Break</a></li>
                <li><a class="dropdown-item" href="#">Véhicule électrique</a></li>
                <li><a class="dropdown-item" href="#">Véhicule de luxe</a></li>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Boîte de vitesses
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Automatique</a></li>
                <li><a class="dropdown-item" href="#">Manuelle</a></li>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Passagers
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">2+</a></li>
                <li><a class="dropdown-item" href="#">4+</a></li>
                <li><a class="dropdown-item" href="#">5+</a></li>
                <li><a class="dropdown-item" href="#">7+</a></li>
            </ul>
        </div>
    </div>
    <div class="vehiclePage3">
        <div class="row">
            <?php foreach ($vehiclesAvailable as $vehicleAvailable) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="#" onclick="loadVehicleDetails(<?= htmlspecialchars(json_encode($vehicleAvailable), ENT_QUOTES, 'UTF-8'  ) ?>, '<?=$dateInfoStart?>', '<?=$dateInfoEnd?>', '<?=$agencyInfoStart?>', '<?=$agencyInfoEnd?>')">
                            <h5><?= htmlspecialchars($vehicleAvailable->brand) . ' ' . htmlspecialchars($vehicleAvailable->model) ?></h5>
                            <?php if ($vehicleAvailable->energy_type == 'Electrique') { ?>
                                <p class="vehicleType"><?= htmlspecialchars($vehicleAvailable->type) ?></p>
                                <p class="btn btn-secondary btnVehicleElec"><img class="iconElec" src="../Image/icon_elec.png" alt=""><?= htmlspecialchars($vehicleAvailable->energy_type) ?></p>
                            <?php } else { ?>
                                <p class="vehicleType"><?= htmlspecialchars($vehicleAvailable->type) . ' | ' . htmlspecialchars($vehicleAvailable->energy_type) ?></p>
                            <?php } ?>
                            <div>
                                <p class="btn btn-secondary btnVehicleAvailable"><i class="bi bi-person"></i><?= htmlspecialchars($vehicleAvailable->passenger_Nb) ?></p>
                                <?php if ($vehicleAvailable->gear == 'Manuelle') { ?>
                                    <p class="btn btn-secondary btnVehicleAvailable"><img class="iconGear" src="../Image/icon_gearbox.png" alt=""><?= htmlspecialchars($vehicleAvailable->gear) ?></p>
                                <?php } else { ?>
                                    <p class="btn btn-secondary btnVehicleAvailable"><img class="iconGear" src="../Image/icon_auto.png" alt=""><?= htmlspecialchars($vehicleAvailable->gear) ?></p>
                                <?php } ?>
                            </div>
                            <div>

                                <img src="<?= htmlspecialchars($vehicleAvailable->image) ?>" class="card-img" alt="...">
                            </div>
                            <div>
                                <p class="vehiclePriceDay"><?= htmlspecialchars($vehicleAvailable->daily_Rate) ?>€ / jour</p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>
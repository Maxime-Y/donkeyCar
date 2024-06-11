<!DOCTYPE html>
<html lang="fr">

<html>

<body class="reservationDetail">
    <?php if (isset($reservation)) : ?>
        <div class="container mt-3 mb-5">
            <div class="card mx-auto" style="max-width: 600px;">
                <div class="card-header text-center">
                <h2 class="card-title text-center">Réservation # <?= htmlspecialchars($reservation['reservation_Nb']) ?></h2>
                </div>
                <div class="card-body">

                    <!-- Groupe des informations client -->
                    <div class="info-group">
                        <h6 class="text-center mt-2 mb-3 fs-4">Détails de la Réservation</h6><hr>
                        <p class="card-text text-center"><strong>Nom du client :</strong> <?= htmlspecialchars($reservation['last_Name']) . ' ' . htmlspecialchars($reservation['first_Name']) ?></p>
                        <p class="card-text text-center"><strong>Date de début :</strong> <?= date("d-m-Y", strtotime($reservation['start_Date'])) ?></p>
                        <p class="card-text text-center"><strong>Date de fin :</strong> <?= date("d-m-Y", strtotime($reservation['end_Date'])) ?></p>
                        <p class="card-text text-center"><strong>Prix total :</strong> <?= number_format($reservation['total_Price'], 2) ?> €</p>
                    </div>
                    <p class="card-text text-center imageReservationDetail">
                        <img src="<?= htmlspecialchars($reservation['vehicle_image']) ?>" alt="Image du véhicule" class="img-fluid mx-auto d-block" style="max-height: 300px;"> <!-- Centre l'image -->
                    </p>
                    <!-- Groupe des informations véhicule -->
                    <div class="info-group2">
                        <h6 class="text-center mt-2 mb-3 fs-4">Informations du véhicule</h6><hr>
                        <p class="card-text text-center"><strong>Marque du véhicule :</strong> <?= htmlspecialchars($reservation['vehicle_brand']) ?></p>
                        <p class="card-text text-center"><strong>Modèle du véhicule :</strong> <?= htmlspecialchars($reservation['vehicle_model']) ?></p>
                        <p class="card-text text-center"><strong>Type de véhicule :</strong> <?= htmlspecialchars($reservation['vehicle_type']) ?></p>
                        <p class="card-text text-center"><strong>Type d'énergie :</strong> <?= htmlspecialchars($reservation['vehicle_energy_type']) ?></p>
                    
                        <hr><h6 class="text-center mt-3 mb-3 fs-4">Agence de retrait du véhicule</h6><hr>
                        <p class="card-text text-center"><strong>Agence :</strong> <?= htmlspecialchars($reservation['agency_name']) ?></p>
                        <p class="card-text text-center"><strong>Adresse :</strong> <?= htmlspecialchars($reservation['agency_address']) ?></p>
                        <p class="card-text text-center"><strong>Téléphone :</strong> <?= htmlspecialchars($reservation['agency_phone']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container mt-5">
            <div class="alert alert-warning" role="alert">
                Informations non disponibles ou réservation non trouvée.
            </div>
        </div>
    <?php endif; ?>    
</body>


</html>
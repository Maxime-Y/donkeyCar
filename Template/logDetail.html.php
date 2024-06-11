<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=login');  // Redirection si l'utilisateur n'est pas connecté
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Détails de l'utilisateur</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .nav-tabs {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Mes informations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reservations-tab" data-toggle="tab" href="#reservations" role="tab" aria-controls="reservations" aria-selected="false">Mes réservations</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Onglet Informations de l'utilisateur -->
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                <div class="card body mx-auto text-center">
                    <p>Nom : <?= htmlspecialchars($user['lastname']) ?></p>
                    <p>Prénom : <?= htmlspecialchars($user['firstname']) ?></p>
                    <p>Email : <?= htmlspecialchars($user['email']) ?></p>
                    <p>Téléphone : <?= htmlspecialchars($user['phone']) ?></p>
                    <p>Adresse : <?= htmlspecialchars($user['address']) ?></p>
                </div>
            </div>

            <!-- Onglet Détails des réservations -->
            <div class="tab-pane fade" id="reservations" role="tabpanel" aria-labelledby="reservations-tab">
                <?php if (empty($reservations)): ?>
                    <p>Aucune réservation trouvée.</p>
                <?php else: ?>
                    <?php foreach ($reservations as $reservation): ?>
                        <div class="card body mx-auto text-center mb-3">
                            <h2>Réservation #<?= htmlspecialchars($reservation['reservation_Nb']) ?></h2>
                            <p>Date de départ : <?= htmlspecialchars($reservation['start_Date']) ?></p>
                            <p>Date de retour : <?= htmlspecialchars($reservation['end_Date']) ?></p>
                            <p>Prix total : <?= htmlspecialchars($reservation['total_Price']) ?> €</p>                            
                            
                            <h3>Agences</h3>
                            <p>Agence de retrait du véhicule : <?= htmlspecialchars($reservation['agency_name']) ?></p>
                            <p>Adresse : <?= htmlspecialchars($reservation['agency_address']) ?></p>
                            <p>Téléphone de l'agence : <?= htmlspecialchars($reservation['agency_phone']) ?></p>

                            <h3>Détails du véhicule</h3>
                            <p>Marque : <?= htmlspecialchars($reservation['vehicle_brand']) ?></p>
                            <p>Modèle : <?= htmlspecialchars($reservation['vehicle_model']) ?></p>
                            <p>Année : <?= htmlspecialchars($reservation['vehicle_year']) ?></p>
                            <p>Tarif journalier : <?= htmlspecialchars($reservation['vehicle_daily_rate']) ?> €</p>
                            <img src="<?= htmlspecialchars($reservation['vehicle_image']) ?>" alt="Image du véhicule" class="img-fluid mx-auto d-block" style="max-height: 300px;">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Intégration de Bootstrap JS (nécessite également jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

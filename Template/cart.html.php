<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon Panier</title>
</head>

<body>

    <div class="container">
        <br>
        <h1 class="d-flex justify-content-center">Votre Panier</h1><br><br>
        <?php if (!empty($_SESSION['cart'])) : ?>
            <form action="index.php?page=confirmReservation" method="post">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">Voiture</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Prix par jours</th>
                        <th scope="col">Date de départ</th>
                        <th scope="col">Date de retour</th>
                        <th scope="col">Agence de départ</th>
                        <th scope="col">Agence de retour</th>
                        <th scope="col">Prix Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                    <?php foreach ($_SESSION['cart'] as $item) : ?>

                        <tr>
                            <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="Image de <?= htmlspecialchars($item['brand']) . ' ' . htmlspecialchars($item['model']) ?>" style="width:100px;"></td>
                            <td><?= htmlspecialchars($item['brand']) . ' ' . htmlspecialchars($item['model']) ?></td>
                            <td><?= htmlspecialchars($item['dailyRate']) ?>€</td>
                            <td><?= htmlspecialchars($item['startDate']) ?></td>
                            <td><?= htmlspecialchars($item['endDate']) ?></td>

                            <?php
                            $startDate = new DateTime($item['startDate']);
                            $endDate = new DateTime($item['endDate']);
                            $interval = $startDate->diff($endDate);
                            $days = $interval->days + 1;
                            $totalPrice = $item['dailyRate'] * $days;
                            ?>
                            <td><?= htmlspecialchars($item['startAgency']) ?></td>
                            <td><?= htmlspecialchars($item['endAgency']) ?></td>
                            <td><?= htmlspecialchars($totalPrice) ?>€</td>
                            <td>
                                <a href="index.php?page=removeFromCart&vehicleId=<?= $item['vehicleId'] ?>">Supprimer</a>
                                <!-- Ajouter un lien pour modifier la quantité si nécessaire -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br><button type="submit" class="btn btn-primary">Réserver</button>
            </form>
    </div>
<?php else : ?>
    <p>Votre panier est vide.</p>
<?php endif; ?>
</body>

</html>
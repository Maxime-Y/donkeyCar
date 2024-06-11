/* script du modal connexion */
const connexionLink = document.getElementById('connexionLink');
const connexionModal = new bootstrap.Modal(document.getElementById('connexionModal'));

connexionLink.onclick = function () {
    connexionModal.show();
}

function redirectToGoogle() {
    window.location.href = 'URL_DE_CONNEXION_GOOGLE';
}

/* script du modal reservation */
const reservationLink = document.getElementById('reservationLink');
const reservationModal = new bootstrap.Modal(document.getElementById('reservationModal'));

reservationLink.onclick = function () {
    reservationModal.show();
}


document.addEventListener("DOMContentLoaded", function () {
    const startDateInput = document.getElementById('start_Date');
    const endDateInput = document.getElementById('end_Date');

    if (startDateInput && endDateInput) {
        startDateInput.addEventListener('change', function () {
            const startDate = new Date(this.value);
            const endDate = new Date(startDate);
            endDate.setFullYear(startDate.getFullYear() + 1);

            endDateInput.min = this.value;
            endDateInput.max = endDate.toISOString().split('T')[0];
        });
    } else {
        console.error("Les éléments avec les ID 'start_Date' ou 'end_Date' n'ont pas été trouvés.");
    }
});


/* script du modal véhicule */
function loadVehicleDetails(vehicle ,  dateinfostart, dateinfoend, agencyinfostart, agencyinfoend) {
    console.log(agencyinfostart);
    console.log(agencyinfoend);
    console.log(dateinfoend);
    console.log(dateinfostart);
    console.log("Vehicle details loaded:", vehicle);

    const modalBody = document.querySelector('#vehicleModal .modal-body');
    const modal = new bootstrap.Modal(document.getElementById('vehicleModal'));

    // Construction du contenu HTML pour le modal
    modalBody.innerHTML = `
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-img colDetails">
                    <h3>${vehicle.brand} ${vehicle.model}</h3>
                    <p class="vehicleType">${vehicle.type} | ${vehicle.energy_type}</p>
                    <img src="${vehicle.image}" class="img-fluid" alt="Image de ${vehicle.brand} ${vehicle.model}">
                    <div class="infoVehicle">
                        <p><i class="bi bi-person-fill"></i> ${vehicle.passenger_Nb} sièges</p>
                        <p><img class="iconGear" src="../Image/icon_gearbox.png" alt="">${vehicle.gear}</p>
                        <p><i class="bi bi-calendar2-check"></i> ${vehicle.year}</p>
                        <p><img class="iconGear" src="../Image/icon_door.png" alt="">${vehicle.door_nb} portes</p>
                    </div>
                </div>
                <div class="col-md-6 colDetails">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                <form action="index.php?page=addToCart" method="post">

                <h5>Options de paiement</h5>
                    <div class="form-check vehicleDetailOption">
                        <label form-check-label for="payement_Option1">Meilleur prix</label>
                        <input class="form-check-input" type="radio" id="payement_Option1" name="payement_Option1" checked>
                    </div>
                    <div class="form-check">
                        <label form-check-label for="payement_Option2">Restez flexible</label>
                        <input class="form-check-input" type="radio" id="payement_Option2" name="payement_Option2" >
                    </div>
                <h5>Kilométrage</h5>
                    <div class="form-check">
                        <label form-check-label for="km_Limited">750 km</label>
                        <input class="form-check-input" type="radio" id="km_Limited" name="km_Limited" checked>
                    </div>
                    <div class="form-check">
                        <label form-check-label for="km_illimited">Illimité</label>
                        <input class="form-check-input" type="radio"  id="km_illimited" name="km_illimited">
                    </div>
                    <input type="hidden" name="vehicle_id" value="${vehicle.id}">
                    <input type="hidden" name="daily_rate" value="${vehicle.daily_Rate}">
                    <input type="hidden" name="brand" value="${vehicle.brand}">
                    <input type="hidden" name="model" value="${vehicle.model}">
                    <input type="hidden" name="image" value="${vehicle.image}">

                    
                    <input type="hidden" name="start_date" value="${dateinfostart}">
                    <input type="hidden" name="end_date" value="${dateinfoend}">
                    <input type="hidden" name="start_agency" value="${agencyinfostart}">
                    <input type="hidden" name="end_agency" value="${agencyinfoend}">

                    
                    
                    <button type="submit" class="btn btn-primary btn-suivant">Ajouter au panier</button>
                </form>
                <p>${vehicle.daily_Rate}€ / jour</p>
                </div>
            </div>
        </div>
    `;
    // Désélectionne l'option 1 si l'option 2 est sélectionnée
    document.getElementById('payement_Option2').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('payement_Option1').checked = false;
        }
    });

    // Désélectionne l'option 3 si l'option 4 est sélectionnée
    document.getElementById('km_illimited').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('km_Limited').checked = false;
        }
    });

    // Désélectionne l'option 2 si l'option 1 est sélectionnée
    document.getElementById('payement_Option1').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('payement_Option2').checked = false;
        }
    });

    // Désélectionne l'option 4 si l'option 3 est sélectionnée
    document.getElementById('km_Limited').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('km_illimited').checked = false;
        }
    });
    // Afficher le modal avec les détails du véhicule
    modal.show();
}






<div style='text-align: center; margin-bottom: 30px;'>
    <form action='/page/update-client' method="post">
        Nom de famille <br>
        <input type="text" name="lastName" value='<?= $client->getLastName(); ?>'><br>
        Prénom <br>
        <input type="text" name="firstName" value='<?= $client->getFirstName(); ?>'><br>
        Email <br>
        <input type="email" name="email" value='<?= $client->getEmail(); ?>'><br>
        Numéro de téléphone (factultatif) <br>
        <input type="text" name="phoneNumber" value='<?= $client->getPhoneNumber(); ?>'><br>
        <input type="hidden" name="idClient" value='<?= $client->getIdClient(); ?>'><br>
        <input type="submit" value="modifier">
    </form>
</div>
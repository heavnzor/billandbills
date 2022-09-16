<div style='text-align: center; margin-bottom: 30px;'>
    <form action='/page/create-bill' method="post">
        Titre<br>
        <input type="text" name="titleBill"><br>
        Service<br>
        <textarea name="service" rows="10" cols="70"></textarea><br>
        Prix HT (en euros)<br>
        <input type="text" name="priceHT"><br>
        <label for="tva-select">TVA:</label><br>

        <select name="vat" id="tva-select">
            <option value="">--Choisissez le taux de TVA--</option>
            <option value="1.2">20%</option>
            <option value="1.1">10%</option>
            <option value="1.055">5.5%</option>
            <option value="1.021">2.1%</option>
            <option value="1">0%</option>
        </select>
        <br>
        <label for="client-select">Client:</label><br>
        <select name="idClient" id="client-select">
            <option value="">--Choisissez un client--</option>
            <?php foreach ($clients as $client) : ?>
            <option value="<?= $client->getIdClient() ?>"><?= $client->getLastName() . " " . $client->getFirstName() ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" value="Créer la facture">
    </form>
</div>
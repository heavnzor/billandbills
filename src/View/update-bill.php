<div style='text-align: center; margin-bottom: 30px;'>
    <form action='/page/update-bill' method="post">
        Titre <br>
        <input type="text" name="titleBill" value='<?= $bill->getTitleBill(); ?>'><br>
        Service <br>
        <textarea name="service" rows="10" cols="70"><?= $bill->getService(); ?></textarea><br>
        Prix HT (en euros) <br>
        <input type="text" name="priceHT" value="<?= $bill->getPriceHT(); ?>"><br>
        <label for="tva-select">TVA:</label><br>

        <select name="vat" id="tva-select">
            <?php switch ($bill->getVat()) {
                case '1.2':
                    $vatPer = "20%";
                    break;
                case '1.1':
                    $vatPer = "10%";
                    break;
                case '1.055':
                    $vatPer = "5.5%";
                    break;
                case '1.021':
                    $vatPer = "2.1%";
                    break;
                case '1':
                    $vatPer = "0%";
                    break;
            }
            ?>
            <option value="<?= $bill->getVat() ?>"><?= $vatPer ?></option>
            <option value="">--Choisir un autre taux de TVA--</option>
            <option value="1.2">20%</option>
            <option value="1.1">10%</option>
            <option value="1.055">5.5%</option>
            <option value="1.021">2.1%</option>
            <option value="1">0%</option>
        </select>
        <br>
        <label for="client-select">Client:</label><br>
        <select name="idClient" id="client-select">
            <option value="<?= $defaultClient->getIdClient() ?>">
                <?= $defaultClient->getLastName() . " " . $defaultClient->getFirstName() ?>
            </option>
            <option value="">--Choisir un autre client--</option>
            <?php foreach ($clients as $client) : ?>
            <option value="<?= $client->getIdClient() ?>">
                <?= $client->getLastName() . " " . $client->getFirstName() ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="hidden" name="idBill" value='<?= $bill->getIdBill(); ?>'><br>
        <input type="submit" value="Modifier la facture">
    </form>
</div>
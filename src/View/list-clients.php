<?php

echo "<ul>";
foreach ($clients as $client) : ?>

<li>
    <b>Nom : </b> <?= $client->getLastName() ?>
</li>
<li>
    <b>Prénom : </b> <?= $client->getFirstName() ?>
</li>
<li>
    <b>Email : </b> <?= $client->getEmail()  ?>
</li>
<li>
    <b>Numéro de téléphone :
    </b><?php $client->getPhoneNumber() !== null ? print($client->getPhoneNumber()) : print("Non renseigné") ?>

</li>
<li><b>Actions : </b>
    <span style='display: flex;'>
        <form action='/page/update-client' method='post'>
            <input type='hidden' name='idClient' value='<?= $client->getIdClient() ?>'>
            <input style='margin-right: 1em; margin-left: 1em;' type='submit' value='modifier'>
        </form>
        <form action='/page/delete-client' method='post'>
            <input type='hidden' name='idClient' value='<?= $client->getIdClient() ?>'>
            <input style='margin-right: 1em; margin-left: 1em;' type='submit' value='supprimer'>
        </form>
    </span>
</li>
<hr>
<?php
endforeach; ?>
</ul>
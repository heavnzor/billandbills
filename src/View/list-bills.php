<?php

echo "<ul>";
foreach ($bills as $bill) : ?>
<li>
    Facture "<?= $bill->getTitleBill(); ?>" numéro <?= $bill->getBillNumber(); ?>
</li>
<li><b>Actions : </b>
    <span style='display: flex;'>
        <form action='/page/read-bill' method='post' target="_blank">
            <input type='hidden' name='idClient' value='<?= $bill->getIdClient() ?>'>
            <input type='hidden' name='idBill' value='<?= $bill->getIdBill() ?>'>
            <input style='margin-right: 1em; margin-left: 1em;' type='submit' value='voir'>
        </form>
        <form action='/page/update-bill' method='post'>
            <input type='hidden' name='idClient' value='<?= $bill->getIdClient() ?>'>
            <input type='hidden' name='idBill' value='<?= $bill->getIdBill() ?>'>
            <input style='margin-right: 1em; margin-left: 1em;' type='submit' value='modifier'>
        </form>
        <form action='/page/delete-bill' method='post'>
            <input type='hidden' name='idClient' value='<?= $bill->getIdClient() ?>'>
            <input type='hidden' name='idBill' value='<?= $bill->getIdBill() ?>'>
            <input style='margin-right: 1em; margin-left: 1em;' type='submit' value='supprimer'>
        </form>
    </span>
</li>
<hr>
<?php
endforeach; ?>
</ul>
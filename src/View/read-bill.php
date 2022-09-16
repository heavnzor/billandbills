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
    $client->getPhoneNumber() ? $phoneNumber = $client->getPhoneNumber() : $phoneNumber = "Non renseigné";
    ?>
 <!DOCTYPE html>
 <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title><?= $bill->getTitleBill(); ?></title>
     </head>

     <body>
         <header>
             <h1>Facture <?= $bill->getBillNumber(); ?></h1>
             <h2>Date: <?= $bill->getDateBill(); ?></h2>
         </header>
         <main>
             <h3>Emetteur</h3>
             <b>Contact : </b> Bill Smith<br>
             <b>E-mail : </b>bill@smithcorp.com<br>
             <b>Numéro de téléphone : </b>0749420156
             <hr>
             <h3>Destinataire</h3>
             <b>Contact : </b> <?= $client->getLastName() . " " . $client->getFirstName(); ?><br>
             <b>E-mail : </b><?= $client->getEmail(); ?><br>
             <b>Numéro de téléphone : </b><?= $phoneNumber; ?>
             <hr>
             <h3>Type : Service </h3>
             <b>Description : </b> <?= $bill->getService();  ?>
             <br> <b>Prix HT : </b> <?= $bill->getPriceHT();  ?>&euro;<br>
             <b>TVA : </b> <?= $vatPer; ?><br>
             <b>Prix TTC : </b> <?= $bill->getPriceTTC(); ?>&euro;
         </main>
     </body>

 </html>
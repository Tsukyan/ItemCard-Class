<?php
require_once('template.html');
$item[0] = 0;

/*
function chargerClasse($classe)
{
  require_once $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}
chargerClasse('itemCard'); */

require_once('itemCard.php');
//require_once('iterateur.php');




AddForm();

for ($i=0; $i<5; $i++) {
      $item[$i] = new cardItem('200','Titre Item ','primary','Resume de l\'item');
}

echo ' <div class="row m-2 border">';
for ($i=0; $i<$_SERVER["itemCardNB"]; $i++) {
    $item[$i]->afficher();
}
echo '</div>';

//ExportToCsv();

$fichierSave = fopen('itemList.csv','w+');
  $text = "Taille :" .$separator. "Titre : " .$separator. "Couleur :" .$separator. "Résumé : \n";
  fwrite($fichierSave,$text);
  for ($i=0; $i<$_SERVER["itemCardNB"]; $i++) {
    $text =  $item[$i]->getTaille() . $separator . $item[$i]->getTitre() . $separator . $item[$i]->getCouleur() . $separator . $item[$i]->getTexte() . "\n\r";
    fwrite($fichierSave,$text);
  }
fclose($fichierSave);



echo '</body></html>';



?>

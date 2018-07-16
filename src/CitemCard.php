<?php
// Globals
$_SERVER["itemCardNB"] = 0;
$separator = ';';


// Nous créons une classe « cardItem ».
class cardItem
{
    private $taille;
    private $titre;
    private $couleur;
    private $texte;

    public function __construct($taille,$titre,$couleur,$texte) // Constructeur demandant 4 paramètres
    {
      $_SERVER["itemCardNB"] = $_SERVER["itemCardNB"] + 1;
      $this->setTaille($taille);
      $this->setTitre($titre);
      $this->setCouleur($couleur);
      $this->setTexte($texte);
      if($this->titre != '')
      {
        echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Succès !</strong> Ajout d\'un Item !
              </div>';
      }
      else
      {
        echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Echec !</strong> Echec de l\'ajout d\'un Item !
              </div>';
      }
    }

      // Nous déclarons une méthode dont le seul but est d'afficher la card Item.
      public function afficher()
      {
        echo '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card m-2 bg-'.$this->couleur.' " style="height-min: '.$this->taille.' px">
                  <div class="hovereffect">
                      <img class="card-img-top img-responsive" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
                      <div class="overlay">
                                  <h2>'.$this->titre.'</h2>
                  				<p>
                  					'.$this->texte.'
                  				</p>
                      </div>
                    </div>

                  <div class="card-body">
                    <h4 class="card-title">'.$this->titre.'<hr/></h4>
                    <p class="card-text">'.$this->texte.'</p>
                    <a href="#" class="btn btn-dark">See Profile</a>
                  </div>
                </div>
              </div>'/*
                <div class="card m-2 bg-'.$this->couleur.' " style="width:'.$this->taille.' px">
                  <div class="card-body">
                    <h4 class="card-title">'.$this->titre.'</h4>
                    <p class="card-text">'.$this->texte.'</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                  </div>
                  <img class="card-img-bottom" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image" style="width:100%">
                </div>    */
                ;
      }

     //SETTER
    public function setTaille($taille)
    {
      $this->taille = $taille;
    }

    public function setTitre($titre)
    {
      $this->titre = $titre;
    }

    public function setCouleur($couleur)
    {
      $this->couleur = $couleur;
    }

    public function setTexte($texte)
    {
      $this->texte = $texte;
    }

    //GETTER

    public function getTaille()
    {
      return $this->taille;
    }

    public function getTitre()
    {
      return $this->titre;
    }

    public function getCouleur()
    {
      return $this->couleur;
    }

    public function getTexte()
    {
      return $this->texte;
    }
}
// Fin de la class et des méthodes


//Fonction globales
  function AddItem()
  {

  }


/*  function ExportToCsv()
  {
    global $separator;
    $fichierSave = fopen('itemList.csv','w+');
      $text = "Taille :" .$separator. "Titre : " .$separator. "Couleur :" .$separator. "Résumé : \n";
      fwrite($fichierSave,$text);
      for ($i=0; $i<$_SERVER["itemCardNB"]; $i++) {
        $text =  $item[$i]->getTaille() . $separator . $item[$i]->getTitre() . $separator . $item[$i]->getCouleur() . $separator . $item[$i]->getTexte() . "\n\r";
        fwrite($fichierSave,$text);
      }
    fclose($fichierSave);
  }*/

  function AddForm()
  {
    echo '
    <div class="container">
      <h2>Ajout un item</h2>
      <form action="#" method="POST">
        <div class="form-group">
          <p>Titre:</p>
          <input type="text" class="form-control" id="title" placeholder="Entrez le titre..." name="title">
        </div>
        <div class="form-group">
          <p>Résumé</p>
          <input type="text" class="form-control" id="resume" placeholder="Entrez le résumé..." name="resume">
        </div>
        <div class="form-group">
          <p>Taille</p>
          <input type="number" class="form-control" id="resume" placeholder="200" name="resume">
        </div>
        <div class="form-group">
        <p>Couleur:</p>
          <select name="coulors" class="custom-select">
            <option selected>Choisir la couleur </option>
            <option value="primary">Bleu</option>
            <option value="success">Vert</option>
            <option value="danger">Rouge</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" onclick="afficher();">Ajouter l\'item</button>
      </form>
    </div>';
  }
?>

<?php 

session_start() ;

require '../../database/create_db.php';

if(!isset($_SESSION['user'])){
    header('Location:../../index.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $pdo->prepare('SELECT * FROM user WHERE user_id = :id');
$req->execute(array(':id' => $_SESSION['user']));
$data = $req->fetch();

$userId = $data['user_id'];
$profilPic = $data['profil_pic'];
$profilBanner = $data['profil_banner'];
$name = ucfirst($data['userName']);
$surname = ucfirst($data['userSurname']);

  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $url = "https"; 
  else
    $url = "http"; 
    
  // Ajoutez // à l'URL.
  $url .= "://"; 
    
  // Ajoutez l'hôte (nom de domaine, ip) à l'URL.
  $url .= $_SERVER['HTTP_HOST']; 
    
  // Ajouter l'emplacement de la ressource demandée à l'URL
  $url .= $_SERVER['REQUEST_URI'];

    $pos = $url;
    $pos = explode(".",$pos);

    $pot = $pos[0];
    $pot = explode("/",$pot);

  if ($pot[6] == "accueil") {
    $nb = 1;
    } else if ($pot[6] == "profil" or $pot[6] == "ami") {
    $nb = 2;
  } else if ($pot[6] == "list-g" or $pot[6] == "groupe") {
    $nb = 3;
  } else if ($pot[6] == "list-p" or $pot[6] == "page") {
    $nb = 4;
  } else if ($pot[6] == "messagerie") {
    $nb = 5;
  } else if ($pot[6] == "notification") {
    $nb = 6;
  } else if ($pot[6] == "demande") {
    $nb = 7;
  } else if ($pot[6] == "plus") {
    $nb = 8;
  }
?>

<style>.color<?php echo $nb ?> {font-weight: bold; color: #84B59F;}</style>

<!-- SECTION : Left Container -->
<main class="container-left ">

<div class="sticky">

    <!-- Logo -->
    <a href="../accueil/accueil.php"><h1 class="title">maggle</h1></a>

    <!-- Item list -->
    <div class="nav-bar">
        <div class="item">
            <a href="../accueil/accueil.php" class="color1 align"> <img src="../../public/icon/home.svg" alt="Accueil" class="icon"> <span class="text-nav-bar">Accueil</span> </a>
        </div>
        <div class="item">
            <a href="../profil/profil.php" class="color2 align"> <img src="../../public/img/<?php echo $profilPic ?>" alt="Profile" class="icon profile-picture img-vide"> <span class="text-nav-bar">Profil</span> </a>
        </div>
        <div class="item">
            <a href="../list/list-g.php" class="color3 align"> <img src="../../public/icon/groupes.svg" alt="Groupes" class="icon"> <span class="text-nav-bar">Groupes</span> </a>
        </div>
        <div class="item">
            <a href="../list/list-p.php" class="color4 align"> <img src="../../public/icon/page.svg" alt="Plus" class="icon"> <span class="text-nav-bar">Pages</span> </a>
        </div>
        <div class="item">
            <a href="../messagerie/messagerie.php" class="color5 align"> <img src="../../public/icon/chat.svg" alt="Messages" class="icon"> <span class="text-nav-bar">Messages</span> </a>
        </div>
        <div class="item">
            <a href="../notification/notification.php" class="color6 align"> <img src="../../public/icon/bell.svg" alt="Notications" class="icon"> <span class="text-nav-bar">Notications</span> </a>
        </div>
        <div class="item">
            <a href="../demande/demande.php" class="color7 align"> <img src="../../public/icon/add.svg" alt="Demandes" class="icon"> <span class="text-nav-bar">Demandes</span> </a>
        </div>
        <div class="item">
            <a href="" class="color8 align"> <img src="../../public/icon/more.svg" alt="Plus" class="icon"> <span class="text-nav-bar">Plus</span> </a>
        </div>
    </div>

    <!-- Button publish -->
    <button type="button" class="btn-publish"><a href="" class="btn btn-publish">Publier</a></button>
    <button type="button" class="btn-publish"><a href="../../public/deconexion.php" class="btn btn-publish">Déconexion</a></button>
</div>

</main>
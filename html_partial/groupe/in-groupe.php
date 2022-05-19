<!-- User text -->
<div class="border marg-top">
    <div class="user-text">
        <img src="../../public/img/<?php echo $profilPic ?>" class="pic profile-picture img-vide">

        <form method="POST" action="../publication/post_group.php"> 
            <textarea minlength="1" name="publi-content" class="read-text" placeholder="Écrire une publication ..."></textarea>
            <div class="user-send align">
                <input type="submit" class="btn-send" value="Envoyer">
            </div>
        </form>
    </div>
 </div>

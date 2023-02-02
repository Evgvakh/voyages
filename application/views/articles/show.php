<p style="border: 3px solid brown">
    Ici y aura les articles. Tous ou filtrees.
    <?php foreach ($data as $key => $value): ?>
<div>
    <h3><?=$value['titre']?>: </h3>
    <p><?=$value['contenu']?>:</p>
</div>
<?php endforeach;?>
<h3>Boek aanpassen....</h3>
<form method='post' action='index.php?pasaan=<?php echo $boek->id ?>'>
    <input type="hidden" name="id" value="<?php echo $boek->id ?>">
    <p>Titel: <input type='text' name='naam' value="<?php echo $boek->title ?>" required></p>
    <p>Auteur: <input type='text' name='auteur' value="<?php echo $boek->author ?>"  required></p>
    <p>ISBN: <input type='number' name='isbn' value="<?php echo $boek->isbn ?>"  required></p>
    <p><input type='submit' name='aanpasKnop' value='UPDATE'></p>
</form>
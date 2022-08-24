<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VerdProg: boekenapplicatie</title>
</head>
<body>
    <h3><a href="?voegtoe">voegtoe</a></h3>

    <?php
    require 'inc/config.inc.php';
    require_once 'models/Book.php';
    require_once 'controllers/Bookcontroller.php';
    // laad de BookController
    $ctr = new Bookcontroller();

    // Verwijderen
    if (isset($_GET['verwijder']))
    {
        $ctr->deleteBook($_GET['verwijder']);
    }

    // AANPASSEN
    if(isset($_GET['pasaan']))
    {
        // als het aanpasformulier verstuurd is, de nieuwe gegevens verwerken
        if(isset($_POST['aanpasKnop']))
        {
            echo $_POST['id'] . $_POST['naam'] . $_POST['auteur'] . $_POST['isbn'];
            $ctr->updateBook($_POST['id'], $_POST['naam'], $_POST['auteur'], $_POST['isbn']);
        }
        // Anders het formulier met oude gegevens tonen
        else
        {
            $ctr->showUpdateForm($_GET['pasaan']);
        }
    }

    if(isset($_GET['voegtoe']))
    {
        if(isset($_POST['knop']))
        {
            $ctr->newBook($_POST['naam'], $_POST['auteur'], $_POST['isbn']);
        }
        else
        {
            ?>
            <h3>Boek toevoegen:</h3>
            <form method="post" action="">
                <p>Titel: <input type="text" name="naam" required></p>
                <p>Auteur: <input type="text" name="auteur" required></p>
                <p>ISBN: <input type="number" name="isbn" required></p>
                <p><input type="submit" name="knop" value="VOEG TOE"></p>
            </form>
            <?php
        }
    }
    if(isset($_GET['id']))
    {
        //toon het juiste boek
        $ctr->showBook($_GET['id']);
    }
    else
    {
        // vraag alle boeken op
        $ctr->index();
    }
    ?>
</body>
</html>
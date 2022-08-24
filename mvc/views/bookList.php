<?php
// zijn er boeken weer te geven?
if (count($boekenArray) > 0)
{
    // start de tabel 
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Titel</th>";
    echo "<th>Auteur</th>";
    echo "<th>ISBN</th>";
    echo "<th>Details</th>";
    echo "<th>Aanpassen</th>";
    echo "<th>Verwijderen</th>";
    echo "</tr>";
    // Lees alle boeken uit
    foreach ($boekenArray as $boek)
    {
        echo "<tr>";
        echo "<td>" . $boek->id . ": </td>";
        echo "<td>" . $boek->title . "</td>";
        echo "<td>" . $boek->author . "</td>";
        echo "<td>" . $boek->isbn . "</td>";
        echo "<td><a href='?id={$boek->id}'>details</a></td>";
        echo "<td><a href='?pasaan={$boek->id}'>Pas aan</a></td>";
        echo "<td><a href='?verwijder={$boek->id}'>Verwijder</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
else 
{
    echo "<p>Geen boeken gevonden</p>";
}
<?php

class Book
{
    public $id = null;
    public $title = "";
    public $author = "";
    public $isbn = "";

    public function load($id)
    {
        // zorg dat de databaseverbinding gebruikt kan worden
        global $mysqli;

        // zoek de gegeven in de database op 
        $query = "SELECT * FROM mvc_boeken WHERE id = " . $id;

        //Voer de query uit en vang het resultaat op 
        $result = mysqli_query ($mysqli, $query);

        // is er een voek met dit id?
        if(mysqli_num_rows($result) > 0)
        {
            //lees de data an het boek uit 
            $row = mysqli_fetch_array($result);

            //Vul de properties van dit object
            $this->id = $id;
            $this->title = $row['title'];
            $this->author = $row['author'];
            $this->isbn = $row['isbn'];
        }
        else
        {
            //Er ging wat mis 
            throw new Exception("kan het boek met id {$id} niet vinden!");
        }
    }
    public function savenew()
    {
        // zorg dat de datbaseeverbinding gebruikt kan worden!
        global $mysqli;
        // als het een nieuw boek is...
        if (is_null($this->id))
        {
            // schoon de data op 
            $this->title = mysqli_real_escape_string($mysqli, $this->title);
            $this->author = mysqli_real_escape_string($mysqli, $this->author);
            // maak de query
            $query = "INSERT INTO mvc_boeken (title, author, isbn)";
            $query .= "VALUES('{$this->title}','{$this->author}','{$this->isbn}')";
            // QUERY UITVOEREN
            if(mysqli_query($mysqli, $query))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        // ...anders bestaat het boek al,en en wordt deze niet toegevoegd
        return false;
    }
    public function showAll()
    {
        global $mysqli;

        // maak een array van alle boeken
        $boeken = Array();

        // lees de is's van alle boeken
        $result = mysqli_query($mysqli, "SELECT id FROM mvc_boeken ORDER BY id");

        // zijn er boeken gevonden?
        if (mysqli_num_rows($result)>0){
            // Voeg all boeken toe aan de Array
            while($row = mysqli_fetch_array($result))
            {
                $bookAdd = new Book();
                $bookAdd ->load($row['id']);
                $boeken[] = $bookAdd;
            }
        }
        return $boeken;
    }
    public function delete()
    {
        global $mysqli;
        if(!is_null($this->id))
        {
            $query = "DELETE FROM mvc_boeken WHERE id = " . $this->id;
            if (mysqli_query($mysqli, $query))
            {
                return true;
            }
        }
        return false;
    }
    public function update()
    {
        // zorg dat de datbaseeverbinding gebruikt kan worden!
        global $mysqli;
        // als het een nieuw boek is...
        if (!is_null($this->id))
        {
            // schoon de data op 
            $this->title = mysqli_real_escape_string($mysqli, $this->title);
            $this->author = mysqli_real_escape_string($mysqli, $this->author);
            $this->isbn = mysqli_real_escape_string($mysqli, $this->isbn);
            // maak de query
            $query = "UPDATE mvc_boeken";
            $query .= "SET title = '{$this->title}', author = '{$this->author}', isbn = {$this->isbn}";
            $query .= "WHERE id = {$this->id}";

            // QUERY UITVOEREN
            if(mysqli_query($mysqli, $query))
            {
                return true;
            }
            else
            {
                echo $query . "<br/>";
                echo mysqli_error($mysqli);
            }
        }
        // ...anders bestaat het boek al,en en wordt deze niet toegevoegd
        return false;
    }
}


<?php

$gramataAtrasta = false;

//izveidojam mainīgo, lai noskaidrotu gramatas indeksu
$gramatasIndeks = -1;

if (isset($_POST['gramata'])) {

    $izveletaGramata = $_POST['gramata'];

    //Atveram CSV failu, kurā ir grāmatu dati
    $jaunaisFails = fopen("gramatas.csv", "r") or die("Nav tāda faila!");

    //Izveidojuma masīvu, kurā saglabāsim visus datus no faila
    $visiDati = [];
    $j = 0;


    for ($i = 0; $i < 5; $i++) {

        $rinda = fgetcsv($jaunaisFails);

        //Ierakstam grāmatas datus masīvā
        $visiDati[] = $rinda;

        if($rinda[0] == $izveletaGramata || $rinda[2] == $izveletaGramata){
            $gramataAtrasta = true;
            $izveletaGramata = $rinda;
            //kad grāmata ir atrasta, tad saglabājam grāmatas indeksu
            $gramatasIndeks = $j;
        }

        //j pēc katras iterācijas palielinās par 1, lai varētu atrast grāmatas indeksu
        $j++;
    }
    fclose($jaunaisFails);
    
}

if($gramataAtrasta){
    if (isset($_POST['skaits'])) {
        $skaits = (int)$_POST['skaits'];

        $pieejamaisSkaits = (int)$izveletaGramata[4];

        if ($skaits <= $pieejamaisSkaits ){
            echo "<h1>Jūsu pirkums:</h1>";
            echo "<h2>Grāmata: " . $izveletaGramata[2] . "</h2>";
            echo "<h2>Autors: " . $izveletaGramata[1] . "</h2>";
            echo "<h2>Skaits: " . $skaits . "</h2>";
            echo "<h2>Cena par vienību: " . $izveletaGramata[3] . "</h2>";
            echo "<h2>Cena kopā: " . $izveletaGramata[3] * $skaits . "</h2>";


            //Izmainam masīvā atrastās grāmatas skaitu
            $visiDati[$gramatasIndeks][4] = $pieejamaisSkaits - $skaits;

            //pēctam sarastām grāmatas datus CSV failā
            $jaunaisFails = fopen("gramatas.csv", "w") or die("Nav tāda faila!");

            foreach ($visiDati as $gramata) {
                fputcsv($jaunaisFails, $gramata);
            }
            fclose($jaunaisFails);


        }elseif($pieejamaisSkaits == 0){
            echo "<h2 style='color: red;'>Grāmata ir jāpasūta</h2><br>";

        }
        else{
            echo "<h2 style='color: red;'>Nav tik daudz grāmatu!</h2><br>";
            echo "<h2>Pieejamais skaits: " . $pieejamaisSkaits . "</h2>";
            echo "<h2>Pasūtītais skaits: " . $skaits . "</h2>";
        }

    }
}else{
    echo "<h2 style='color: red;'>Nav tādas grāmatas!</h2><br>";

}
?>

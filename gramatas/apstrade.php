

<?php

//Dabūajam ISBN vai gramatas nosaukumu no HTML formas
if (isset($_POST['gramata'])) {
    //Saglabājam lietotāja ievadi jaunā mainīgajā
    $izveletaGramata = $_POST['gramata'];

    //Atveram CSV failu, kurā ir grāmatu dati
    $jaunaisFails = fopen("gramatas.csv", "r") or die("Nav tāda faila!");

    $visiDati = [];
    $gramatasIndeks = 0;
    //Mainīgais, kas norāda vai grāmata ir atrasta
    $gramataAtrasta = false;
    for ($i = 0; $i < 5; $i++) {
        //Nolasam katru rindu no faila un sadalam to masīvā
        $rinda = fgetcsv($jaunaisFails,100, ",");
        $visiDati[] = $rinda;

        //Ja ir ir taāda grāmata pēc nosaukuma vai ISBN, tad saglabājam to mainīgajā un beidzam loop.
        if($rinda[0] == $izveletaGramata || $rinda[2] == $izveletaGramata){
            $gramataAtrasta = true;
            $izveletaGramata = $rinda;
        }
        $gramatasIndeks++;
    }
    
}

//ja grāmata ir atrasta
if($gramataAtrasta){
    //dabūjam grāmtas skaitus no lietotāja ievades
    if (isset($_POST['skaits'])) {
        $skaits = (int)$_POST['skaits'];

        //saglabājam pieejamo grāmatu skaitu no CSV faila
        $pieejamaisSkaits = (int)$izveletaGramata[4];

        //pārbaudam, vai gramatu skaits ir pieteikams, ja ir, tad izvadam pirkuma informāciju
        if ($skaits <= $pieejamaisSkaits ){
            echo "<h1>Jūsu pirkums:</h1>";
            echo "<h2>Grāmata: " . $izveletaGramata[2] . "</h2>";
            echo "<h2>Autors: " . $izveletaGramata[1] . "</h2>";
            echo "<h2>Skaits: " . $skaits . "</h2>";
            echo "<h2>Cena par vienību: " . $izveletaGramata[3] . "</h2>";
            echo "<h2>Cena kopā: " . $izveletaGramata[3] * $skaits . "</h2>";

            $visiDati[$gramatasIndeks][4] = $pieejamaisSkaits - $skaits;
            //atjaunojam CSV failu ar jauniem datiem
            $jaunaisFails = fopen("gramatas.csv", "w") or die("Nav tāda faila!");
            //rakstam jaunos datus CSV failā
            foreach ($visiDati as $gramata) {
                fputcsv($jaunaisFails, $gramata);
            }
            fclose($jaunaisFails);
        }elseif($pieejamaisSkaits == 0){
            //ja grāmatu skaits ir 0, tad izvadam kļūdas paziņojumu
            echo "<h2 style='color: red;'>Grāmata ir jāpasūta</h2><br>";

        }
        //Ja nav, tad izvadam kļūdas paziņojumu
        else{
            echo "<h2 style='color: red;'>Nav tik daudz grāmatu!</h2><br>";
            echo "<h2>Pieejamais skaits: " . $pieejamaisSkaits . "</h2>";
            echo "<h2>Pasūtītais skaits: " . $skaits . "</h2>";
        }

    }
//ja nav grāmatas, tad izvadam kļūdas paziņojumu
}else{
    echo "<h2 style='color: red;'>Nav tādas grāmatas!</h2><br>";

}
?>

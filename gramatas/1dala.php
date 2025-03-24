<html>
    <title>Emīls Vētra</titles>
</html>

<?php
// Izveido masīvu ar 5 grāmatām (datu secību skaties pēc Excel faila, ar kuru strādājāt iepriekš. Nr.p.k. vietā būtu jābūt ISBN - numurus nepārrakstīsim, bet izmantosim šo kolonnu, kad nolasīsim info no faila).
// Izvadi masīvu HTML failā (nav jāizmanto speciāli tag, tikai jāizvada).
// Masīvs tiek veidots no datiem, izgūtiem no *.xlsx failā.
// Lai nolasītu *.xlsx failu, projektam jāpievieno SimpleXLSX klasi, kura atrodama internetā. Skaties šeit!
// Title ieraksti savu vārdu un uzvārdu


//Nolasam datus no Excel faila
include 'SimpleXLSX.php';

if ($xlsx = SimpleXLSX::parse('dati_masiviem.xlsx')){
    //Dabū visus datus 2D masīvā
    $rindas = $xlsx->rows(0);

    //Izveido masīvu ar 5 grāmatām

    $masivs = array();
    for($i = 1; $i <6; $i++){

        $masivs[]= array(
            'ISBN' =>$rindas[$i][0],
            'Autors' =>$rindas[$i][1],
            'Nosaukums' =>$rindas[$i][2],
            'Cena' =>number_format($rindas[$i][5] * 1.25,2),
        );
    }

    //Izvadam masīvu ar 5 grāmatām

    print_r($masivs);
    // foreach ($masivs as $gramata){
    //     echo 'ISBN: ' . $gramata['ISBN'] . '<br>';
    //     echo 'Autors: ' . $gramata['Autors'] . '<br>';
    //     echo 'Nosaukums: ' . $gramata['Nosaukums'] . '<br>';
    //     echo 'Cena: ' . $gramata['Cena'] . '<br>';
    //     echo '<br>';

    // }


}else{
    echo SimpleXLSX::parseError();
}
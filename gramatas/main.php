<?php
// Izveido masīvu ar 5 grāmatām (datu secību skaties pēc Excel faila, ar kuru strādājāt iepriekš. Nr.p.k. vietā būtu jābūt ISBN - numurus nepārrakstīsim, bet izmantosim šo kolonnu, kad nolasīsim info no faila).
// Izvadi masīvu HTML failā (nav jāizmanto speciāli tag, tikai jāizvada).
// Masīvs tiek veidots no datiem, izgūtiem no *.xlsx failā.
// Lai nolasītu *.xlsx failu, projektam jāpievieno SimpleXLSX klasi, kura atrodama internetā. Skaties šeit!
// Title ieraksti savu vārdu un uzvārdu.


include 'SimpleXLSX.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Emīls Vētra</title>
</head>


    <?php
    if ($xlsx = SimpleXLSX::parse('dati_masiviem.xlsx')) {
        $sheets = $xlsx->sheetNames();
        $darijumiIndex = array_search('darījumi', $sheets);

        //echo "dariujumu lapa: " . $darijumiIndex . "<br>";  
        
        $data = $xlsx->rows(1);
        
        // Create array with 5 books
        $books = array();
        for ($i = 1; $i < 6; $i++) {
            $books[] = array(
                'ISBN' => $data[$i][0],
                'Autors' => $data[$i][1],
                'Nosaukums' => $data[$i][2],
                'Datums' => $data[$i][3],
                'Skaits' => $data[$i][4],
                'Cena' => $data[$i][6]

            );
        }
        
        // Alternative simple output without table
        echo '<h2>Vienkāršs izvads:</h2>';
        // The Number 25569
        // This represents the number of days between:
        //January 1, 1900 (Excel's date system starting point)
        //January 1, 1970 (Unix timestamp starting point, or "epoch")
        //So when you see a number like 44086 in Excel, that means it's the 44,086th day since January 1, 1900, which corresponds to September 12, 2020.
        //The Number 86400 is the number of seconds in a day:
        //24 hours × 60 minutes × 60 seconds = 86,400 seconds
        foreach ($books as $book){
            echo 'ISBN: ' . $book['ISBN'] . '<br>';
            echo 'Autors: ' . $book['Autors'] . '<br>';
            echo 'Nosaukums: ' . $book['Nosaukums'] . '<br>';
            echo 'Datums: ' . date('d/m/Y', ($book['Datums'] - 25569) * 86400) . '<br>';            echo 'Skaits: ' . $book['Skaits'] . '<br>';
            echo 'Cena: ' . $book['Cena'] . '<br>';
            echo '<br>';
        }
    } else {
        echo 'Error reading Excel file: ' . SimpleXLSX::parseError();
    }
    ?>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Results</title>
</head>

<body>
    <h1>Sorting Results</h1>

    <form method="post" action="">
        <p>Please choose the array to sort:</p>
        <label>
            <input type="radio" name="arrayType" value="skatli" checked>
            Skaitļi (Numbers)
        </label>
        <br>
        <label>
            <input type="radio" name="arrayType" value="vardi">
            Vārdi (Words)
        </label>
        <br>
        <input type="submit" value="Sort">
    </form>

    <?php
    // include "dati.php";
    // include "insertion_sort.php";
    // include "bubble_sort.php";

    // $selected = $_POST["arrayType"];
        
    // if ($selected === "skatli") {
    //     $array = $masivs1;  // Numbers array 
    // } elseif ($selected === "vardi") {
    //     $array = $masivs2;  // Words array
    // } else {
    //     echo "<p>Invalid selection.</p>";
    //     exit;
    // }

    // echo "<h2>Insertion Sort</h2>";
    // echo "<p><strong>Pirms kartošanas:</strong></p> ";

    // foreach ($array as $value) {
    //     echo $value . " ";
    // }       

    // echo "<p><strong>Masivs pēc kartošanas:</strong></p> ";
    // $start = microtime(true);
    // $isertion_masivs = insertion_sort($array);
    // $end = microtime(true);
    // $time = $end - $start;
    // foreach ($isertion_masivs as $value) {
    //     echo $value . " ";
    // }
    // echo "<p>Laiks: $time sec</p>";

    // echo "<h2>Bubble Sort</h2>";    
    // echo "<p><strong>Pirms kartošanas:</strong></p> ";
    // foreach ($array as $value) {
    //     echo $value . " ";
    // }
    // echo "<p><strong>Pēc kartošanas:</strong></p> ";
    // $start = microtime(true);
    // $bubble_masivs = bubble_sort($array);
    // $end = microtime(true);
    // $time = $end - $start;
    // foreach ($bubble_masivs as $value) {
    //     echo $value . " ";
    // }

    // echo "<p>Laiks: $time sec</p>";

    ?>
</body>
</html> -->

<html>
    <body>
    <form action="" method="post">
        <h1>Izvēlies masīvu tipu</h1>
        <input type="radio"  name="inputMasivs" value="skaitlu" checked>

            <label>Skaitlu masivs</label><br>

        <input type="radio"  name="inputMasivs" value="vardu">

            <label>Vardu masivs</label><br>

        <h1>Izvēlies kartošanas algoritmu</h1>

        <input type="radio"  name="inputAlgo" value="bubble" checked>

            <label>Bubble Sort</label><br>

        <input type="radio"  name="inputAlgo" value="insertion">

            <label>Insertion Sort</label><br>

        
        <input type="radio"  name="inputAlgo" value="shell">

            <label>Shell Sort</label><br>

        
        <input type="radio"  name="inputAlgo" value="bisection">

            <label>Bisection Sort</label><br>

        <input type="submit" value="Submit">


    </form> 
        <?php

        include "dati.php";
        include "bisection_sort.php";
        include "bubble_sort.php";
        include "insertion_sort.php";
        include "shell_sort.php";


        if($_POST["inputMasivs"]){
            $selected = $_POST["inputMasivs"];
            if($selected === "skaitlu"){
                $array = $masivs1;  // Numbers array    
            }elseif($selected === "vardu"){
                $array = $masivs2;  // Words array
            }
        }

        echo "<h1>Masīvs sākumā: </h1>";

        foreach($array as $value){
            echo $value . " ";  
        }
        if($_POST["inputAlgo"]){
            $selectedAlgo = $_POST["inputAlgo"];

            if($selectedAlgo === "bubble"){
                echo "<h1>Bubble Sort <h1>";
                $sakumaLaiks = microtime(true);
                $kartotaisMasivs = bubble_sort($array);
                $beiguLaiks = microtime(true);
                $laiks = $beiguLaiks - $sakumaLaiks;
                echo "<h1>Izpildes laiks: $laiks sek</h1>";

                $sakumaLaiksSort = microtime(true);
                sort($array);
                $beiguLaiksSort = microtime(true);
                $laiksSort = $beiguLaiksSort - $sakumaLaiksSort;
                echo "<h1>sort() funkcijas izpildes laiks: $laiksSort sek</h1>";

                if ($laiks < $laiksSort) {
                    echo "<h1>Bubble sort ir ". $laiksSort - $laiks ." sek ātrāks par sort() funkciju</h1>";
                } else {
                    echo "<h1>sort() funkcija ir ". $laiks - $laiksSort. " sek ātrāka par Bubble sort</h1>";
                }
                
            }elseif($selectedAlgo === "insertion"){ 
                echo "<h1>insertion Sort <h1>";
                $sakumaLaiks = microtime(true);
                $kartotaisMasivs = insertion_sort($array);
                $beiguLaiks = microtime(true);
                $laiks = $beiguLaiks - $sakumaLaiks;
                echo "<h1>Izpildes laiks: $laiks sek</h1>";

                $sakumaLaiksSort = microtime(true);
                sort($array);
                $beiguLaiksSort = microtime(true);
                $laiksSort = $beiguLaiksSort - $sakumaLaiksSort;
                echo "<h1>sort() funkcijas izpildes laiks: $laiksSort sek</h1>";

                if ($laiks < $laiksSort) {
                    echo "<h1>Insertion sort ir ". $laiksSort - $laiks ." sek ātrāks par sort() funkciju</h1>";
                } else {
                    echo "<h1>sort() funkcija ir ". $laiks - $laiksSort. " sek ātrāka par Insertion sort</h1>";
                }

            }elseif($selectedAlgo === "shell"){
                echo "<h1>Shell Sort <h1>";
                $sakumaLaiks = microtime(true);
                $kartotaisMasivs = shell_sort($array);
                $beiguLaiks = microtime(true);
                $laiks = $beiguLaiks - $sakumaLaiks;
                echo "<h1>Izpildes laiks: $laiks sek</h1>";

                $sakumaLaiksSort = microtime(true);
                sort($array);
                $beiguLaiksSort = microtime(true);
                $laiksSort = $beiguLaiksSort - $sakumaLaiksSort;
                echo "<h1>sort() funkcijas izpildes laiks: $laiksSort sek</h1>";

                if ($laiks < $laiksSort) {
                    echo "<h1>Shell sort ir ". $laiksSort - $laiks ." sek ātrāks par sort() funkciju</h1>";
                } else {
                    echo "<h1>sort() funkcija ir ". $laiks - $laiksSort. " sek ātrāka par Shell sort</h1>";
                }
                

            }elseif($selectedAlgo === "bisection"){
                echo "<h1>Bisection Sort <h1>";
                $sakumaLaiks = microtime(true);
                $kartotaisMasivs = bisection_sort($array);
                $beiguLaiks = microtime(true);
                $laiks = $beiguLaiks - $sakumaLaiks;
                echo "<h1>Izpildes laiks: $laiks sek</h1>";   
                
                $sakumaLaiksSort = microtime(true);
                sort($array);
                $beiguLaiksSort = microtime(true);
                $laiksSort = $beiguLaiksSort - $sakumaLaiksSort;
                echo "<h1>sort() funkcijas izpildes laiks: $laiksSort sek</h1>";

                if ($laiks < $laiksSort) {
                    echo "<h1>Bisection sort ir ". $laiksSort - $laiks ." sek ātrāks par sort() funkciju</h1>";
                } else {
                    echo "<h1>sort() funkcija ir ". $laiks - $laiksSort. " sek ātrāka par Bisection sort</h1>";
                }
                
            }

            echo "<h1>Masīvs pēc kārtošanas: </h1>"; 

            foreach($kartotaisMasivs as $value){
                echo $value . " ";  
            }

        }

        ?>
    </body>
</html>
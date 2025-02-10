<!DOCTYPE html>
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
    include "dati.php";
    include "insertion_sort.php";
    include "bubble_sort.php";

    $selected = $_POST["arrayType"];
        
    if ($selected === "skatli") {
        $array = $masivs1;  // Numbers array
    } elseif ($selected === "vardi") {
        $array = $masivs2;  // Words array
    } else {
        echo "<p>Invalid selection.</p>";
        exit;
    }

    echo "<h2>Insertion Sort</h2>";
    echo "<p><strong>Pirms kartošanas:</strong></p> ";

    foreach ($array as $value) {
        echo $value . " ";
    }       

    echo "<p><strong>Masivs pēc kartošanas:</strong></p> ";
    $start = microtime(true);
    $isertion_masivs = insertion_sort($array);
    $end = microtime(true);
    $time = $end - $start;
    foreach ($isertion_masivs as $value) {
        echo $value . " ";
    }
    echo "<p>Laiks: $time sec</p>";

    echo "<h2>Bubble Sort</h2>";    
    echo "<p><strong>Pirms kartošanas:</strong></p> ";
    foreach ($array as $value) {
        echo $value . " ";
    }
    echo "<p><strong>Pēc kartošanas:</strong></p> ";
    $start = microtime(true);
    $bubble_masivs = bubble_sort($array);
    $end = microtime(true);
    $time = $end - $start;
    foreach ($bubble_masivs as $value) {
        echo $value . " ";
    }

    echo "<p>Laiks: $time sec</p>";

    ?>
</body>
</html>
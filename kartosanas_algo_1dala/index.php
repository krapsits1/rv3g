<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Results</title>
</head>
<body>
    <h1>Sorting Results</h1>

    <?php
        include "dati.php";
        include "insertion_sort.php";
        include "bubble_sort.php";

        echo "<h2>Masivs1</h2>";
        echo "<p><strong>Pirms kartošanas:</strong> " . implode(", ", $masivs1) . "</p>";

        $sorted_masivs1_bubble = bubble_sort($masivs1);
        echo "<p><strong>Pēc Bubble Sort:</strong> " . implode(", ", $sorted_masivs1_bubble) . "</p>";

        $sorted_masivs1_insertion = insertion_sort($masivs1);
        echo "<p><strong>Pēc Insertion Sort:</strong> " . implode(", ", $sorted_masivs1_insertion) . "</p>";

        echo "<h2>Masivs2</h2>";
        echo "<p><strong>Pirms kartošanas:</strong> " . implode(", ", $masivs2) . "</p>";

        $sorted_masivs2_bubble = bubble_sort($masivs2);
        echo "<p><strong>Pēc Bubble Sort:</strong> " . implode(", ", $sorted_masivs2_bubble) . "</p>";

        $sorted_masivs2_insertion = insertion_sort($masivs2);
        echo "<p><strong>Pēc Insertion Sort:</strong> " . implode(", ", $sorted_masivs2_insertion) . "</p>";
    ?>

</body>
</html>
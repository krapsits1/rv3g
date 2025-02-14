<?php
function shell_Sort($my_array)
{
    // Inicializēt atstarpes lielumu
    $x = round(count($my_array) / 2);
    
    // Cikls, kamēr atstarpes lielums kļūst par 0
    while ($x > 0)
    {
        // Pāriet cauri masīva elementiem ar pašreizējo atstarpi
        for ($i = $x; $i < count($my_array); $i++)
        {
            // Saglabāt pašreizējo elementu pagaidu mainīgajā
            $temp = $my_array[$i];
            $j = $i;
            
            // Pārvietot masīva elementus, kas ir lielāki par temp, ar intervālu atstarpes lielumā
            // uz pozīcijām priekšā no to pašreizējās pozīcijas
            while ($j >= $x && $my_array[$j - $x] > $temp)
            {
                $my_array[$j] = $my_array[$j - $x];
                $j -= $x;
            }
            
            // Ievietot pagaidu mainīgo (saglabāto elementu) tā pareizajā pozīcijā
            $my_array[$j] = $temp;
        }
        
        // Samazināt atstarpes lielumu nākamajai iterācijai
        $x = round($x / 2.2);
    }
    
    // Atgriezt sakārtoto masīvu
    return $my_array;
}
?>
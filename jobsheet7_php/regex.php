<?php
// Cocokkan huruf kecil
$pattern = '/[a-z]/'; // Cocokkan huruf kecil.
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!<br>";
} else {
    echo "Tidak ada huruf kecil!<br>";
}

// Cocokkan satu atau lebih digit
$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!<br>";
}

// Mengganti 'apple' dengan 'banana'
$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text . "<br>"; // Output: "I like banana pie."

// Cocokkan "god", "good", "gooood" (huruf 'o' muncul minimal 2 kali, maksimal 4 kali)
$pattern = '/go{2,4}d/'; // Cocokkan "good", "gooood" (huruf 'o' muncul 2 hingga 4 kali).
$text = 'god is good, gooood, and goooood.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!<br>";
}
?>





<?php
$myfile = fopen("P1.txt", "r") or die("Unable to open file!");
$fileContent= fread($myfile,filesize("p1.txt"));
function count_Vowels($string)
{
    preg_match_all('/[aeiou]/i', $string, $matches);
    return count($matches[0]);
}
function isConsonant($ch)
{
    // To handle lower case
    $ch = strtoupper($ch);
  
    return !($ch == 'A' || $ch == 'E' ||
            $ch == 'I' || $ch == 'O' ||
            $ch == 'U') && ord($ch) >= 65 && ord($ch) <= 90;
}
function totalConsonants($str)
{
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++)
  
        // To check is character is Consonant
        if (isConsonant($str[$i]))
            ++$count;
        
    return $count;
}

function no_digits($str)
{
    $digits=0;
    for ($i = 0; $i < strlen($str); $i++)
    {
        if(ctype_digit($str[$i]))
        {
            $digits+=1;
        }
    }
    return $digits;
}

function count_spcl($string)
{
    preg_match_all('/[!@#$%^&*()_+-={}|\:]/', $string, $matches);
    return count($matches[0]);
}

$chars = strlen($fileContent);
$vowels = count_Vowels($fileContent);
$words = str_word_count($fileContent);
echo $words." Words<br>";
echo $chars." Characters<br>";
echo $vowels." Vowels<br>";
echo totalConsonants($fileContent)." COnsonants<br>";
echo no_digits($fileContent)." Digits<br>";
echo count_spcl($fileContent)." Special Characters<br>";
echo filesize("P1.txt")." bytes is File Size<br>";
echo "<br><br><br>";
echo "File content : <br><br>$fileContent";








fclose($myfile);
?>
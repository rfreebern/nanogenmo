<?php

function fakeText ($words) {
    $text = '';

    $l = array(
        explode(',', 'b,c,ch,ck,d,f,g,gh,h,j,k,l,ll,m,n,p,ph,qu,r,s,sh,st,t,th,v,w,wh,y,z'),
        explode(',', 'a,e,i,o,u'),
        explode('|', ', |, |, |, |, |, |, |, |, |, |, |, |, |, |, |. |. |. |. |. |. |. |. |. |. |. |. |. |. |. |. |. |. |. | -- |? |? |? |? | | | | | | | |: |; |; |! ')
    );
    
    for ($j = 0; $j < $words; $j++) {
        for ($i = 0, $letters = rand(2, 4); $i < $letters; $i++) {
            $text .= $l[$j % 2][rand(0, count($l[$j % 2]) - 1)] . $l[($j + 1) % 2][rand(0, count($l[($j + 1) % 2]) - 1)];
        }
        $text .= $l[2][rand(0, count($l[2]) - 1)];
    }
    $text = ucfirst(preg_replace('/([\.\?]) ([a-z])/e', "'\\1 ' . strtoupper('\\2')", trim($text)));
    return preg_replace('/\W$/', '.', $text);
}

$outputWords = 0;
$chapter = 1;
print strtoupper(fakeText(3)) . "\n\n";
print "Ryan Freebern\n\n";
print "PROLOGUE\n\n";
do {
    $output = fakeText(rand(5, 120)) . "\n\n";
    if (rand(1, 20) == 1) {
        print "CHAPTER $chapter\n\n";
        $chapter++;
    }
    print $output;
    $outputWords += count(explode(' ', $output));
} while ($outputWords < 50000);
print "EPILOGUE\n\n";
print fakeText(rand(5, 120)) . "\n\n";


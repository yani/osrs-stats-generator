<?php

require_once __DIR__ . '/../src/ImageGenerator.php';
require_once __DIR__ . '/../src/Skills.php';

$skills = new \Xenokore\OSRS\StatsGenerator\Skills();

if (isset($_GET['user']) && \is_string($_GET['user'])) {

    $url = 'http://services.runescape.com/m=hiscore_oldschool/index_lite.ws?player=' . \urlencode($_GET['user']);
    
    $curl = \curl_init();
    \curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    \curl_setopt($curl, CURLOPT_HEADER, false);
    \curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    \curl_setopt($curl, CURLOPT_URL, $url);
    \curl_setopt($curl, CURLOPT_REFERER, $url);
    \curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $get = \curl_exec($curl); 
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    \curl_close($curl);
    
    if($http_code === 404 || empty($get)) {
        die('user not found');
    }

    $get = \explode("\n", $get);

    $i=1;

    foreach ([
        "total", "attack", "defence", 
        "strength", "hitpoints", "ranged", 
        "prayer", "magic", "cooking", "woodcutting", 
        "fletching", "fishing", "firemaking", 
        "crafting", "smithing", "mining", 
        "herblore", "agility", "thieving", 
        "slayer", "farming", "runecraft", 
        "hunter", "construction"
    ] as $skill) {
        if($skill === 'total') {
            continue;
        }
        if($skill === 'runecrafting') {
            $skill = 'runecraft';
        }
        if($skill === 'hp' || $skill === 'constitution') {
            $skill = 'hitpoints';
        }
        
        $temp  = explode(",", $get[$i++]);
        $level = (empty($temp[0]))?'':$temp[1];
        $skills->setSkill($skill, $level);
    }
} else {
    $skills->setSkills($_GET);
}

$img_gen = new \Xenokore\OSRS\StatsGenerator\ImageGenerator($skills);

\header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
\header('Last-Modified: ' . \gmdate("D, d M Y H:i:s") . ' GMT');
\header('Cache-Control: no-store, no-cache, must-revalidate');
\header('Cache-Control: post-check=0, pre-check=0', false);
\header('Pragma: no-cache');
\header('Content-type: image/png');

echo $img_gen->generate();

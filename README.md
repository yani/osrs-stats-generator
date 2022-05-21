OSRS Stats image generator
==========================

OSRS stats image generator library for PHP.

### Installation

```
composer require xenokore/osrs-stats-generator
```

Image generation uses the PHP extenion `gd`.

There's a script included which uses `cURL` to look up a user from the highscores.
If the script is not uses cURL is not required.

### Usage

User can be looked up from highscores:

```php
/public/index.php?user=noize
```

### Library usage

```php
// Either set skills using (array)[<current_lvl>, <max_lvl>] or (string)<level>.
// Skills are defaulted to their lowest lvl (1 and 10 for hitpoint) and are not required to be set.
$skills = new \Xenokore\OSRS\StatsGenerator\Skills([
        'hitpoints' => [5, 10],
        'attack' => 10
    ]
);

$img_gen = new \Xenokore\OSRS\StatsGenerator\ImageGenerator($skills);

// Set image headers:
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: image/png");

// Output image
echo $img_gen->generate();
```

Skill names:

```
attack
defence
strength
hitpoints
ranged
prayer
magic
cooking
woodcutting
fletching
fishing
firemaking
crafting
smithing
mining
herblore
agility
thieving
slayer
farming
runecraft
hunter
construction
```

Total level is calculated automatically. 

### Example

![image](https://user-images.githubusercontent.com/6956790/169636088-497a0630-f68f-4a14-b1a4-3e658b5ccfa3.png)

### License

**MIT**

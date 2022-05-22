OSRS Stats image generator
==========================

OSRS stats image generator library for PHP.

### Installation

```
composer require xenokore/osrs-stats-generator
```

Image generation uses the PHP extension `gd`.

There's a public script included which uses the `cURL` extension to look up a user from the highscores.
cURL is not required if using the library directly in your project.

### Usage

You can use the public script to look up a user from the highscores from your browser:

```php
/public/index.php?user=noize
```

Or pass `GET` parameters for the skills you want to set:

```php
/public/index.php?hitpoints=50,90&attack=80,75&mining=99
```

You can set the current level and max level by separating them with a `,`. This is useful for boosted stats or to show current hitpoints.

You can find a list of skill names below. The total level is calculated automatically. 

### Library usage

```php
// Either set skills using (array)[<current_lvl>, <max_lvl>] or (string)<level>.
// Skills are defaulted to their lowest lvl (10 for hitpoints and 1 for others) and are not required to be set.
$skills = new \Xenokore\OSRS\StatsGenerator\Skills([
        'hitpoints' => [5, 10],
        'attack' => 10
    ]
);

$img_gen = new \Xenokore\OSRS\StatsGenerator\ImageGenerator($skills);

// Set image headers:
\header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
\header('Last-Modified: ' . \gmdate("D, d M Y H:i:s") . ' GMT');
\header('Cache-Control: no-store, no-cache, must-revalidate');
\header('Cache-Control: post-check=0, pre-check=0', false);
\header('Pragma: no-cache');
\header('Content-type: image/png');

// Output image
echo $img_gen->generate();
```

### Skill names

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

Note that it's `runecraft` instead of *runecrafting*

### Example output

![image](https://user-images.githubusercontent.com/6956790/169636088-497a0630-f68f-4a14-b1a4-3e658b5ccfa3.png)

### License

**MIT**

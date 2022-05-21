<?php

namespace Xenokore\OSRS\StatsGenerator;

class ImageGenerator
{

    private $skills;

    public function __construct($skills = null)
    {
        if(!is_null($skills)) {
            $this->setSkills($skills);
        }
    }

    public function setSkills(Skills $skills)
    {
        $this->skills = $skills;
    }

    public function generate()
    {
        if(is_null($this->skills)) {
            throw new \Exception('skills not set');
            return 0;
        }

        $font = __DIR__ . '/../res/font/Rupee_Foradian.ttf';

        // fetch the base image and create a resource from it
        $img = \imagecreatefrompng(__DIR__ . '/../res/base.png');
        
        // create the color for the text
        $yellow = \imagecolorallocate($img, 255, 255, 51);

        $skills = $this->skills->getAllSkillLevels();

        \imagettftext($img, 8, 0, 36+(0*62), 15+(0*32), $yellow, $font, $skills['attack'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(0*32), $yellow, $font, $skills['attack'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(0*32), $yellow, $font, $skills['hitpoints'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(0*32), $yellow, $font, $skills['hitpoints'][1]);

        \imagettftext($img, 8, 0, 36+(2*62), 15+(0*32), $yellow, $font, $skills['mining'][0]);
        \imagettftext($img, 8, 0, 49+(2*62), 28+(0*32), $yellow, $font, $skills['mining'][1]);

        \imagettftext($img, 8, 0, 36+(0*62), 15+(1*32), $yellow, $font, $skills['strength'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(1*32), $yellow, $font, $skills['strength'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(1*32), $yellow, $font, $skills['agility'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(1*32), $yellow, $font, $skills['agility'][1]);

        \imagettftext($img, 8, 0, 36+(2*62), 15+(1*32), $yellow, $font, $skills['smithing'][0]);
        \imagettftext($img, 8, 0, 49+(2*62), 28+(1*32), $yellow, $font, $skills['smithing'][1]);

        \imagettftext($img, 8, 0, 36+(0*62), 15+(2*32), $yellow, $font, $skills['defence'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(2*32), $yellow, $font, $skills['defence'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(2*32), $yellow, $font, $skills['herblore'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(2*32), $yellow, $font, $skills['herblore'][1]);

        \imagettftext($img, 8, 0, 36+(2*62), 15+(2*32), $yellow, $font, $skills['fishing'][0]);
        \imagettftext($img, 8, 0, 49+(2*62), 28+(2*32), $yellow, $font, $skills['fishing'][1]);

        \imagettftext($img, 8, 0, 36+(0*62), 15+(3*32), $yellow, $font, $skills['ranged'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(3*32), $yellow, $font, $skills['ranged'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(3*32), $yellow, $font, $skills['thieving'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(3*32), $yellow, $font, $skills['thieving'][1]);

        \imagettftext($img, 8, 0, 36+(2*62), 15+(3*32), $yellow, $font, $skills['cooking'][0]);
        \imagettftext($img, 8, 0, 49+(2*62), 28+(3*32), $yellow, $font, $skills['cooking'][1]);

        \imagettftext($img, 8, 0, 36+(0*62), 15+(4*32), $yellow, $font, $skills['prayer'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(4*32), $yellow, $font, $skills['prayer'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(4*32), $yellow, $font, $skills['crafting'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(4*32), $yellow, $font, $skills['crafting'][1]);

        \imagettftext($img, 8, 0, 36+(2*62), 15+(4*32), $yellow, $font, $skills['firemaking'][0]);
        \imagettftext($img, 8, 0, 49+(2*62), 28+(4*32), $yellow, $font, $skills['firemaking'][1]);

        \imagettftext($img, 8, 0, 36+(0*62), 15+(5*32), $yellow, $font, $skills['magic'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(5*32), $yellow, $font, $skills['magic'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(5*32), $yellow, $font, $skills['fletching'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(5*32), $yellow, $font, $skills['fletching'][1]);

        \imagettftext($img, 8, 0, 36+(2*62), 15+(5*32), $yellow, $font, $skills['woodcutting'][0]);
        \imagettftext($img, 8, 0, 49+(2*62), 28+(5*32), $yellow, $font, $skills['woodcutting'][1]);

        \imagettftext($img, 8, 0, 36+(0*62), 15+(6*32), $yellow, $font, $skills['runecraft'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(6*32), $yellow, $font, $skills['runecraft'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(6*32), $yellow, $font, $skills['slayer'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(6*32), $yellow, $font, $skills['slayer'][1]);

        \imagettftext($img, 8, 0, 36+(2*62), 15+(6*32), $yellow, $font, $skills['farming'][0]);
        \imagettftext($img, 8, 0, 49+(2*62), 28+(6*32), $yellow, $font, $skills['farming'][1]);

        \imagettftext($img, 8, 0, 36+(0*62), 15+(7*32), $yellow, $font, $skills['construction'][0]);
        \imagettftext($img, 8, 0, 49+(0*62), 28+(7*32), $yellow, $font, $skills['construction'][1]);

        \imagettftext($img, 8, 0, 36+(1*62), 15+(7*32), $yellow, $font, $skills['hunter'][0]);
        \imagettftext($img, 8, 0, 49+(1*62), 28+(7*32), $yellow, $font, $skills['hunter'][1]);

        $total_str_length = \strlen((string)$skills['total']);

        $total_str_offset = 7;
        if($total_str_length === 3) {
            $total_str_offset = 3;
        }
        if($total_str_length === 4) {
            $total_str_offset = 0;
        }

        \imagettftext($img, 8, 0, 146 + $total_str_offset, 28+(7*32), $yellow, $font,  $skills['total']);

        \ob_start();
        \imagepng($img);
        \imagedestroy($img);
        $img_data = \ob_get_contents(); // read from buffer
        \ob_end_clean(); // delete buffer

        return $img_data;
    }
}

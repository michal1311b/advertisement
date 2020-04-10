<?php

namespace App\Http\Service;

trait Color
{
    public static function getColor($id) {
        $colors = [
            '#8e8e8e', 
            '#b2e710', 
            '#db560b', 
            '#42b242', 
            '#909090',
            '#abe119',
            '#c53101',
            '#c3a020',
            '#3eaf3b',
            '#78b905',
            '#b2e617',
            '#36b123',
            '#727272',
            '#bd1a11',
            '#afe80d',
            '#2270a0',
            '#2197c7',
            '#4074d9',
            '#fd4e4b',
            '#055787',
            '#818181',
            '#174eb3',
            '#f3343c',
            '#116593',
            '#35a8a1',
            '#ff6f6f',
            '#478ce9',
            '#0d78ac',
            '#979795',
            '#921d8f',
            '#ce2a33',
            '#79c7f8',
            '#c4c505',
            '#fea53d',
            '#981798',
            '#d63138',
            '#ff3638',
            '#d8d518',
            '#fd9e1e',
            '#940883',
            '#bb0615',
            '#fcac31',
            '#ff2f38',
            '#727272',
            '#30afb8',
            '#277ecd',
            '#ff3bb7',
            '#fe8830',
            '#95bcff',
            '#005dbc',
            '#2975d7',
            '#d50484',
            '#ff6e1f',
            '#72a6f1',
            '#025694',
            '#2c7ed0',
            '#f929a5',
            '#055fc0',
            '#fb8626',
            '#277fd8',
            '#cf0b89',
            '#ff4135',
            '#29a3c8',
            '#fa2d32',
            '#fc9eea',
            '#e55c25',
            '#5fdaff',
            '#289fc9',
            '#c9e3fe',
            '#f36527',
            '#f48fdb',
            '#ff3c3d',
            '#0883a4',
            '#b4d7ff',
            '#62dafd',
            '#24a2cb',
            '#137e88',
            '#afe31e',
            '#ef4512',
            '#ffc512',
            '#34b447',
            '#8f8f8f',
            '#afe314',
            '#db6619',
            '#ffd429',
            '#4077d4',
            '#1979ab',
            '#919191',
            '#4684e7',
            '#5083f0',
            '#f530a4',
            '#fe3db2',
            '#055dbf',
            '#0060c1',
            '#ff393a',
            '#ef4933'
        ];
        
        return $colors[$id-1];
    }

    public static function hex2rgb($colour) {
        if ($colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
                list($r, $g, $b) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
                list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
                return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);

        return array('red' => $r, 'green' => $g, 'blue' => $b);
    }
}
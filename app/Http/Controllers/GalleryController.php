<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Poster;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{
    public function storePosers()
    {
        $adverisements = Advertisement::with([
            'state',
            'location',
            'work',
            'settlement',
            'currency',
            'specialization',
            'user',
            'user.profile'
        ])
        ->orderby('created_at', 'asc')
        ->get();

        foreach($adverisements as $adverisement)
        {
           if($this->checkPosterExist($adverisement->id))
           {
               continue;
           }

            $bgColor = $this->getColor($adverisement->specialization->id);
            $bg = $this->hex2rgb($bgColor);
            // Copy and resample the imag
            $source_file = public_path('/images/advert_avatar.jpg');

            list($width, $height) = getimagesize($source_file);
            $image_p = imagecreatetruecolor($width, $height);
            $image = imagecreatefromjpeg($source_file);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
            
            // Prepare font size and colors
            $text_color = imagecolorallocate($image_p, 255, 255, 255);
            $bg_color = imagecolorallocate($image_p, $bg['red'], $bg['green'], $bg['blue']);
            $font = public_path('/arial.ttf');
            $font_size = 40; 
            
            // Set the offset x and y for the text position
            $offset_x = 30;
            $offset_y = 200;
            
            $text1 = $adverisement->title;
            $text2 = $adverisement->settlement->name . ': ' . $adverisement->min_salary. '-'.$adverisement->min_salary . $adverisement->currency->symbol;
            $text3 = trim($adverisement->location->city) . ', ' . $adverisement->state->name;
            $text4 = $adverisement->user->profile->company_name;
            $text5 = 'Specjalizacja: ' . $adverisement->specialization->name;
            // Get the size of the text area
            $dims1 = imagettfbbox($font_size, 0, $font, $text1);
            $dims4 = imagettfbbox($font_size, 0, $font, $text4);
            $dims5 = imagettfbbox($font_size, 0, $font, $text5);

            $text_width1 = $dims1[4] - $dims1[6] + $offset_x;
            $text_width4 = $dims4[4] - $dims4[6] + $offset_x;
            $text_width5 = $dims5[4] - $dims5[6] + $offset_x;

            while($text_width1 > 1024 || $text_width4 > 1024 || $text_width5 > 1024) {
                $font_size = $font_size - 5;

                $dims1 = imagettfbbox($font_size, 0, $font, $text1);
                $dims4 = imagettfbbox($font_size, 0, $font, $text4);
                $dims5 = imagettfbbox($font_size, 0, $font, $text5);

                $text_width1 = $dims1[4] - $dims1[6] + $offset_x;
                $text_width4 = $dims4[4] - $dims4[6] + $offset_x;
                $text_width5 = $dims5[4] - $dims5[6] + $offset_x;
            }
            
            // Add text background
            imagefilledrectangle($image_p, 0, 0, 900, 150, $bg_color);
            
            // Add title
            imagettftext($image_p, $font_size, 0, $offset_x, $offset_y, $text_color, $font, $text1);
            imagettftext($image_p, $font_size, 0, $offset_x, $offset_y+70, $text_color, $font, $text5);
            imagettftext($image_p, $font_size, 0, $offset_x, $offset_y+140, $text_color, $font, $text3);
            imagettftext($image_p, $font_size, 0, $offset_x, $offset_y+210, $text_color, $font, $text4);
            imagettftext($image_p, $font_size, 0, $offset_x, $offset_y+280, $text_color, $font, $text2);
            
            $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $path = $isHttp . "{$_SERVER['HTTP_HOST']}" .  '/posters' . '/'. time(). '_' .rand(1, 10000) .'.jpg';
            
            // Save the picture
            imagejpeg($image_p, public_path('/posters' . '/'. time(). '_' . rand(1, 10000) .'.jpg'), 100); 
        
            // Clear
            imagedestroy($image); 
            imagedestroy($image_p);
            
            Poster::create([
                'posterable_id' => $adverisement->id,
                'posterable_type' => 'App\Advertisement',
                'path' => $path
            ]);
        }
    }

    private function checkPosterExist($id)
    {
        $poster = Poster::where('posterable_id', $id)
        ->where('posterable_type', 'App\Advertisement')
        ->first();

        if($poster) {
            return true;
        }
    }

    private function hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );

        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
    }

    private function getColor($id) {
        
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
}

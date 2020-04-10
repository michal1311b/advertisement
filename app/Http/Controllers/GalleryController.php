<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\ForeignOffer;
use App\Poster;
use Image;
use App\Http\Service\Color;
use Illuminate\Database\Eloquent\Collection;

class GalleryController extends Controller
{
    function __construct() {
        $this->isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $this->source_file = public_path('/images/advert_avatar.jpg');
        list($this->width, $this->height) = getimagesize($this->source_file);
        $this->font = public_path('/arial.ttf');
        $this->font_size = 40;
        $this->offset_x = 30;
        $this->offset_y = 200;
        $this->extraOffset = 70;
    }

    public function storePosers()
    {
        $adverisements = $this->buildCollection();

        foreach($adverisements as $adverisement)
        {
            $modelName = get_class($adverisement);
            if($this->checkPosterExist($adverisement->id, $modelName)) {
                continue;
            }

            $bgColor = Color::getColor($adverisement->specialization->id);
            $bg = Color::hex2rgb($bgColor);
            // Copy and resample the imag
            
            $image_p = imagecreatetruecolor($this->width, $this->height);
            $image = imagecreatefromjpeg($this->source_file);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $this->width, $this->height, $this->width, $this->height); 
            
            // Prepare font size and colors
            $text_color = imagecolorallocate($image_p, 255, 255, 255);
            $bg_color = imagecolorallocate($image_p, $bg['red'], $bg['green'], $bg['blue']);
            
            $title = $adverisement->title;
            $payConditions = $adverisement->settlement->name . ': ' . $adverisement->min_salary. '-'.$adverisement->max_salary . $adverisement->currency->symbol;
            $location = get_class($adverisement) === "App\Advertisement" ? trim($adverisement->location->city) . ', ' . $adverisement->state->name : $adverisement->city;
            $company_name = $adverisement->user->profile->company_name;
            $specialization = 'Specjalizacja: ' . $adverisement->specialization->name;
            // Get the size of the text area
            $dims1 = imagettfbbox($this->font_size, 0, $this->font, $title);
            $dims4 = imagettfbbox($this->font_size, 0, $this->font, $company_name);
            $dims5 = imagettfbbox($this->font_size, 0, $this->font, $specialization);

            $text_width1 = $dims1[4] - $dims1[6] + $this->offset_x;
            $text_width4 = $dims4[4] - $dims4[6] + $this->offset_x;
            $text_width5 = $dims5[4] - $dims5[6] + $this->offset_x;

            while($text_width1 > 1024 || $text_width4 > 1024 || $text_width5 > 1024) {
                $this->font_size = $this->font_size - 1;

                $dims1 = imagettfbbox($this->font_size, 0, $this->font, $title);
                $dims4 = imagettfbbox($this->font_size, 0, $this->font, $company_name);
                $dims5 = imagettfbbox($this->font_size, 0, $this->font, $specialization);

                $text_width1 = $dims1[4] - $dims1[6] + $this->offset_x;
                $text_width4 = $dims4[4] - $dims4[6] + $this->offset_x;
                $text_width5 = $dims5[4] - $dims5[6] + $this->offset_x;
            }
            
            // Add text background
            imagefilledrectangle($image_p, 0, 0, 900, 150, $bg_color);
            
            // Add title
            imagettftext($image_p, $this->font_size, 0, $this->offset_x, $this->offset_y, $text_color, $this->font, $title);
            imagettftext($image_p, $this->font_size, 0, $this->offset_x, $this->offset_y+$this->extraOffset, $text_color, $this->font, $specialization);
            imagettftext($image_p, $this->font_size, 0, $this->offset_x, $this->offset_y+2*$this->extraOffset, $text_color, $this->font, $location);
            imagettftext($image_p, $this->font_size, 0, $this->offset_x, $this->offset_y+3*$this->extraOffset, $text_color, $this->font, $company_name);
            imagettftext($image_p, $this->font_size, 0, $this->offset_x, $this->offset_y+4*$this->extraOffset, $text_color, $this->font, $payConditions);
            
            $destination = '/posters' . '/'. time(). '_' .rand(1, 10000) .'.jpg';
            $path = $this->isHttp . "{$_SERVER['HTTP_HOST']}" .  $destination;

            // Save the picture
            imagejpeg($image_p, public_path($destination), 100); 
        
            // Clear
            imagedestroy($image); 
            imagedestroy($image_p);
            
            Poster::create([
                'posterable_id' => $adverisement->id,
                'posterable_type' => $modelName,
                'path' => $path
            ]);

            $this->font_size = 40;
        }
    }

    private function checkPosterExist($id, $type)
    {
        $poster = Poster::where('posterable_id', $id)
        ->where('posterable_type', $type)
        ->first();

        if($poster) {
            return true;
        }
    }

    private function buildCollection() {
        $advertisements = Advertisement::with([
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

        $foreigns = ForeignOffer::with([
            'work',
            'settlement',
            'currency',
            'specialization',
            'user',
            'user.profile'
        ])
        ->orderby('created_at', 'asc')
        ->get();

        $items = new Collection();

        foreach($advertisements as $advertisement)
        {
            $items->push($advertisement);
        }

        foreach($foreigns as $foreign)
        {
            $items->push($foreign);
        }

        return collect($items);
    }
}

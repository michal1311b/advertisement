<?php

namespace App\Http\Controllers;

use App\Jooble;
use App\Specialization;
use DOMDocument;
use Illuminate\Http\Request;

class JoobleController extends Controller
{
    public function getData()
    {
        $url = "https://pl.jooble.org/api/";
        $key = env('JOOBLE_KEY');

        $inputJob = ["Lekarz", "Stomatolog", "Dentysta"];
        $inputKeyword = array_rand($inputJob, 1);
        
        for($i=10; $i>=0; $i--)
        {
            $specializations = [
                "okulista",
                "ortopeda",
                "pediatra",
                "psychiatra",
                "dermatolog",
                "alergolog",
                "lekarz rodzinny",
                "kardiolog",
                "ginekolog",
                "internista",
                "geriatra"
            ];

            foreach($specializations as $specialization) {
                //create request object
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url."".$key);
                curl_setopt($ch, CURLOPT_POST, 1);

                curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
                    "keywords": ' . $specialization .', 
                    "salary": "50",
                    "searchMode": "1",
                    "page": ' . (string)$i .'
                }');
                
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

                // receive server response ...
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $server_output = curl_exec ($ch);
                curl_close ($ch);

                //print response
                $data = json_decode($server_output);
                
                if(isset($data->jobs))
                {
                    $this->storePreview($data->jobs);
                }
            }
        }
    }

    private function storePreview($data)
    {
        foreach($data as $input) {
            $jooble = Jooble::where('sourceId', $input->id)->exists();
            
            $description = file_get_contents($input->link);
            $explode2 = explode('</div>', $description);

            $doc = new DOMDocument();
            @$doc->loadHTML($description);

            $searchword = 'desc_text_paragraph ea_desc';

            $matches = array_filter(
                $explode2, 
                function($var) use ($searchword) { 
                    return preg_match("/\b$searchword\b/i", $var); 
            });

            $dsp = '';

            if(count($matches))
            {
                $dsp = array_values($matches);
                
                $first = str_replace('<div class="vacancy-desc_text_wrapper">', '', $dsp[0]);
                $second = str_replace('<div class="desc_text_paragraph ea_desc">', '', $first);
            
                if($jooble !== true && trim($input->salary) !== '') {
                    Jooble::create([
                        'title' => $input->title,
                        'description' => trim($second),
                        'location' => $input->location,
                        'salary' => $input->salary ?? null,
                        'source' => $input->source,
                        'type' => $input->type ?? null,
                        'link' => $input->link ?? null,
                        'company' => $input->company ?? null,
                        'sourceId' =>  $input->id
                    ]);
                }
            }
        }
    }

    public function show(Jooble $jooble)
    {
        $preview = $jooble;

        return view('preview.show', compact('preview'));
    }

    public function edit(Jooble $jooble)
    {
        return view('admin.preview.edit', compact('jooble'));
    }

    public function update(Request $request, Jooble $jooble)
    {
        $jooble->update($request->all());

        session()->flash('success', trans('crudInfos.preview-update-success'));

        return back();
    }

    public function index()
    {
        $jooblies = Jooble::paginate();

        return view('admin.preview.index', compact('jooblies'));
    }
}

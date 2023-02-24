<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller
{
    public function view()
    {
        $data = Rate::limit(3)->get();

        return view('home', compact('data'));
    }

    static function formatText($text)
    {
        return Str::limit($text, 20, ' ...');
    }

    public function getRates()
    {
        $data = Rate::all();

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
        //  return ('Rates', compact('data'));
    }

    public function getRate($id)
    {
        $data = Rate::find($id);

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function myT()
    {
        $id = 3;

        //  $data = Rate::where('seller_id', $id)->get();
        $data = Rate::find($id);
        $datas = compact('data');

        //   echo json_encode($datas, JSON_UNESCAPED_UNICODE);
        return $datas;
    }

    public function uploRate(Request $request)
    {
        $Rate = new Rate();

        $Rate->name = $request->name;
        $Rate->price = $request->price;
        $Rate->rate = $request->rate;
        $Rate->category = $request->category;
        $Rate->year = $request->year;
        $Rate->color = $request->color;
        $Rate->brand_name = $request->brand_name;
        $Rate->status = 'Disponible';

        /*   $image = $request->file('image');

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('rate', $imagename);
            $Rate->image = $imagename;
        }
        */

        $Rate->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $rate = Rate::find($id);

        $rate->name = $request->name;
        $rate->email = $request->email;

        $image = $request->file;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('rate', $imagename);

            $rate->image = $imagename;
        }

        $rate->save();

        return redirect()->back();
    }
}
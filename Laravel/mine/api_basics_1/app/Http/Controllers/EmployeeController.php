<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Country;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country)
    {
        $country = $country->paginate(2);   
        return response()->json($country, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $rules = 
        [
            'iso' => 'required|min:2|max:2',
            'name' => 'required|min:3|max:20',
            'dname' => 'required|min:3|max:20',
            'iso3' => 'required|min:2|max:3',
            'position' => 'required|min:1|max:2',
            'numcode' => 'required|max:10',
            'phonecode' => 'required|max:10',
            'created' => 'required|min:1|max:10',
            'register_by' => 'required|min:1|max:2',
            'modified' => 'required|min:1|max:10',
            'modified_by' => 'required|min:1|max:2'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $create = Country::create($request->all());
        return response()->json($create, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return $this->noInstance();
        }
        else 
        {
            return response()->json($country, 200);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $country = Country::find($id);
        if(is_null($country))
        {
            return $this->noInstance();
        }
        else 
        {
            $update = $country->update($request->all());
            return response()->json($update,201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return $this->noInstance();
        }
        else 
        {
            $delete = $country->delete();
            return response()->json(null,204);
        }
    }


    private function noInstance()
    {
            return response()->json(["message" => "No Data Found"], 404);
        
    }

    public function imageDownload()
    {
        return response()->download(public_path("images/example.jpg"), "User Image");
    }

    public function imageUpload(Request $request)
    {
        $filename = Carbon::now()->timestamp . "image.jpg";
        $path = request()->file('image')->move(public_path('images/'), $filename); 
        $imageURL = url('images/'.$filename);
        return response()->json(["url" => $imageURL], 200);
    }
}

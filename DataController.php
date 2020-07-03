<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data;
use PDF;

class DataController extends Controller
{
     public function index()
     {
     	return view('data.index');
     }

     public function register_page()
     {
     	return view('data.register');
     }

     public function save(Request $request )
     {
     	$newdata = new data;
     	$newdata->username = $request->username;
     	$newdata->password = bcrypt($request->password);

     	$newdata->save();
     	if($newdata){
     		return redirect('index')->with('message','DATA SUBMITTED SUCCESFULLY');
     	}
     }



     public function generatePDF()
    {
        $data = [
          'title' => 'First PDF for Coding Driver',
          'heading' => 'Hello from Coding Driver',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'        
            ];
        
        $pdf = PDF::loadView('generate_pdf', $data);
  
        return $pdf->download('codingdriver.pdf');
    }
}


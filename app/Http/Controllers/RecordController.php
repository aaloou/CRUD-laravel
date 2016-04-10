<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\CSV;

class RecordController extends Controller
{
	private $dataRequired=['first_name'=>true,
							'middle_name'=>false,
						   'last_name'=>true,
						   'gender'=>true,
						   'nationality'=>true,
						   'dob'=>true,
						   'phone'=>true,
						   'mobile'=>true,
						   'email'=>true,
						   'address'=>false,
						   'preferred_mode_of_contact'=>true,
						   'qualification'=>false,
						   'university'=>false,
						   'high_school'=>false
						  ];
	private function validateRequiredFields($data)
	{
		
		$validation=[];
		foreach ($this->dataRequired as $key => $value) {
			if($value)
			{
				if(isset($data[$key]) && strlen($data[$key])) $validation[]=true;
				else $validation[]=false;
			}$validation[]=true;
		}
		if(in_array(false, $validation)) return false;
		else return true;
	}
	public function getNew()
	{
		
		return view('formdata.new')->withTitle('Entry form');
	}
	public function postNew()
	{
		$data=Input::all();
		unset($data['_token']);
		if($this->validateRequiredFields($data))
		{
			$record=new CSV("records.csv",public_path()."/records");
			if($record->isOK()) 
			{
				$record->add($data);
				if($record->commit()) return redirect('/new')->withSuccess('Client record inserted');
				else return redirect('/new')->withError('Error inserting client record');
			}
		}
		else return redirect('/new')->withError('Data validation error.');
	}
	public function getView()
	{
		$record=new CSV("records.csv",public_path()."/records");
		//dd($record->all());
		if($record->isOK()) $items = collect($record->all());
		else $item=collect();
		$page = Input::get('page', 1);
		$perPage = 5;
		$paginator = new LengthAwarePaginator(
		    $items->forPage($page, $perPage), $items->count(), $perPage, $page
		);
		$paginator->setPath('/view');
		return view('formdata.view')->withData($paginator)->withKeys(array_keys($this->dataRequired));
		}
}

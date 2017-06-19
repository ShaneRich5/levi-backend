<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Church;
use App\Models\DistrictOffice;
use App\Models\NationalOffice;
use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{
	public function index() {
		$nationalOffices = NationalOffice::all();
		$districtOffices = DistrictOffice::all();
		$churches = Church::all();

		return response()->json([
			'nationalOffices' => $nationalOffices,
			'districtOffices' => $districtOffices,
			'churches' => $churches
		]);
	}
}
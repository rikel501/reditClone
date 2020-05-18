<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller {
    
	public function getTermsCondicions(Request $request) {
		$app_name = $request->app_name;
		return view("legal.terms_conditions")->with(['app_name' => $app_name]);
	}

	public function getPrivacyPolicy() {
		return view("legal.privacy_policy");
	}

}
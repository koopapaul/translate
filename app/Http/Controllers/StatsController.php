<?php

namespace App\Http\Controllers;

use App\TranslatedString;
use App\User;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'hasRole:Root']);
    }

	public function translationsPerDay(){
		// created
		$createdData = TranslatedString::selectRaw('COUNT(*) AS count, DATE(created_at) AS date')->groupBy('date')->get();
		$created = $createdData->pluck('count', 'date');

		// voted up?
		// voted down?
		// accepted?
		// deleted?

		return view('stats.translations', compact('created'));
	}

	public function usersPerDay(){
		$createdData = User::selectRaw('COUNT(*) AS count, DATE(created_at) AS date')->groupBy('date')->get();
		$created = $createdData->pluck('count', 'date');

		return view('stats.users', compact('created'));
	}
}

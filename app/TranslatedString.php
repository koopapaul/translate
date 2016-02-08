<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslatedString extends Model {

	protected $fillable = [
		'project_id', 'language_id', 'base_string_id', 'user_id', 'text', 'up_votes', 'down_votes', 'is_accepted'
	];

	public function user() {
		return $this->hasOne('App\User');
	}

	public function language() {
		return $this->belongsTo('App\Language');
	}

	public function project() {
		return $this->belongsTo('App\Project');
	}
}
<?php
/**
 * Copyright (c) Unknown Worlds Entertainment, 2016. 
 * Created by Lukas Nowaczek <lukas@unknownworlds.com> <@lnowaczek>
 * Visit http://unknownworlds.com/
 * This file is a part of proprietary software. 
 */

namespace App\LanguageFileHandling;


interface OutputHandlerInterface {
	public function __construct($project, $translations);

	public function getOutputFile();
}
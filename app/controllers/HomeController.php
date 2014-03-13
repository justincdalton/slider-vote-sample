<?php

class HomeController extends BaseController {


	public function getIndex()
	{
        $images = Image::all();

        return View::make('home.index')
        		->with('images', $images);
	}

	public function getSaveVote($id, $dir)
	{
		$image = Image::find($id);

		$image->addVote($dir);

		$image->save();

		return $image->getPercent($dir);
	}

}
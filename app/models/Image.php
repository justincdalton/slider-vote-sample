<?php

class Image extends Eloquent {

	public function getPercent($dir) {
		$total = $this->UpVotes + $this->DownVotes;

		if ($total < 1) {
			$value = 0;
		} else if ($dir == "up") {
			$value = $this->UpVotes / $total;
		} else if ($dir == "down") {
			$value = $this->DownVotes / $total;
		}

		return round($value * 100, 0);
	}

	public function addVote($dir)
	{
		if ($dir == "up") {
			$this->UpVotes = $this->UpVotes + 1;
		} else if ($dir == "down") {
			$this->DownVotes = $this->DownVotes + 1;
		}
	}
}

?>

<?php 
interface musicplayer{
	public function playaudio();
}

class winamp implements musicplayer{
	public function playaudio(){
		echo "Winamp music";
	}
}

class mp4player implements musicplayer{
	public function playaudio(){
		echo "Mp4player music";
	}
}

interface videoplayer{
	public function playvideo();
}

class powerdvd implements videoplayer{
	public function playvideo(){
		echo "Powerdvd video";
	}
} 

class powerdvdAdapter implements musicplayer{
	protected $videoplayer;
	
	public function __construct(videoplayer $videoplayer){
		$this->videoplayer = $videoplayer;
	}

	public function playaudio(){
		return $this->videoplayer->playvideo();
	}
}

$adapter = new powerdvdAdapter(new powerdvd());
$adapter->playaudio();
?>
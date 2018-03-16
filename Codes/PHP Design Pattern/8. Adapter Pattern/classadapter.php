<?php 
class ipod{
	public function applemusic(){
		echo "Ipod Music";
	}
}

class spotify{
	public function spotifymusic(){
		echo "Spotify Music";
	}
}

class spotifyAdapter{
	protected $spotify;
	public function __construct(spotify $spotify){
		$this->spotify = $spotify;
	}

	public function applemusic(){
		$this->spotify->spotifymusic();
	}
}

$adapter = new spotifyAdapter(new spotify());
$adapter->applemusic();
?>
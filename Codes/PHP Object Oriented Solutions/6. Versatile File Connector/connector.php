<?php 
/**
 * @copyright 2018 Photon Enterprise
 * @author    Shabuktagin Photon Khan  khan.photon@gmail.com
 * @version   1.0
 * 
 */

/**
 * Remote Connector
 * Lets us access with remotely
 */
class RemoteConnector{
	protected $url;
	protected $remoteFile;
	protected $error;
	protected $urlParts;

     /**
      * Accepts Url (Instantiation)
      * @param string $url remote file connectore url
      */
	public function __construct($url){
		$this->url = $url;
		$this->checkURL();
		if(ini_get('allow_url_fopen')):
			// $this->accessDirect();
			// $this->useCurl();
			$this->useSocket();
		elseif(function_exists('curl_init')):
			$this->useCurl();
		else:
			$this->useSocket();
		endif;
	}

    /**
     * checkURL Checks URL Validity
     * @return null 
     */
	public function checkURL(){
		$flags = FILTER_FLAG_SCHEME_REQUIRED | FILTER_FLAG_HOST_REQUIRED;
		$urlOK = filter_var($this->url, FILTER_VALIDATE_URL, $flags);
		$this->urlParts = parse_url($this->url);
		$regex = "/^[^.]+?\.\w{2}/";
		$domainOK = preg_match($regex, $this->urlParts['host']);
		if(!$urlOK || $this->urlParts['scheme'] != 'http'  || !$domainOK):
			throw new Exception("{$this->url} is not a valid URL");
		endif;
	}

	/**
	 * accessDirect  Uses file_get_contents 
	 * @return null Connects to the remote website
	 */
	public function accessDirect(){
		$this->remoteFile = @file_get_contents($this->url);
		$headers = @get_headers($this->url, 1);
		if($headers):
			$regex = "/\d{3}/";
			preg_match($regex, $headers[0], $m);
			echo $m[0];
		endif;
	}

	/**
	 * useCurl  Uses cURL session  
	 * @return null Connects to the remote website
	 */
	public function useCurl(){
		if($session = curl_init($this->url)):
			//Suppress the HTTP headers
			curl_setopt($session, CURLOPT_HEADER, FALSE);
			//Return the remote file as a string
			curl_setopt($session, CURLOPT_RETURNTRANSFER, TRUE);
			//Get the remote file and store it in the $remoteFile property
			$this->remoteFile = curl_exec($session);
			//Get the HTTP status
			echo curl_getinfo($session, CURLINFO_HTTP_CODE);
			//Close the cURL session
			curl_close($session);
		else:
			$this->error = "Cannot establish cURL session";
		endif;
	}

	/**
	 * useSocket  Uses Socket connection 
	 * @return null  Connects to the remote website
	 */
	public function useSocket(){
		$port = isset($this->urlParts['port'])? $this->urlParts['port'] : 80;
		$remote = fsockopen($this->urlParts['host'], $port, $errno, $errstr, 30);
		if(!$remote):
			$this->remoteFile = FALSE;
			$this->error = "Couldnt create a socket connection: $errstr";
		else:
			//Add the query string to th epath, if it exists
			if(isset($this->urlParts['query'])):
				$path = $this->urlParts['path']."?".$this->urlParts['query'];
			else:
				$path = $this->urlParts['path'];
			endif;
			//Create the request headers
			$out = "GET $path HTTP/1.1\r\n";
			$out .= "Host: {$this->urlParts['host']}\r\n";
			$out .= "Connection: Close \r\n\r\n";
			//Send the headers
			fwrite($remote, $out);
			//Capture the response
			$this->remoteFile = stream_get_contents($remote);
			fclose($remote);
		endif;
	}

	public function __toString(){
		if(!$this->remoteFile):
			$this->remoteFile = '';
		endif;
		return $this->remoteFile;
	}
}

$url = "http://sphotonkhan.com/";
try{
	$output = new RemoteConnector($url);
	echo $output;
}
catch(Exception $e){
	echo "Error: ".$e->getMessage();
}
?>

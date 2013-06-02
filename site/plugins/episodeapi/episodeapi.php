<?php

setlocale(LC_ALL, 'de_DE');

define('STATE_NO',       0);
define('STATE_OVER',     1);
define('STATE_SOON',     2);
define('STATE_LIVE',     3);
define('STATE_RECORDED', 4);

class Episodes {
	static $newest    = null;
	static $next      = null;
	static $nextInfos = null;
	static $episodes  = array();
	
	static function loadCache() {
		$file = @file_get_contents(ROOT_SITE_CACHE . '/episodes.ser');
		
		if(!$file) return;
		
		$data = unserialize($file);
		
		static::$newest    = $data[0];
		static::$next      = $data[1];
		static::$episodes  = $data[2];
	}
	
	static function next() {
		if(static::$next) return static::nextData(static::$next);
		
		$pages = site()->pages()->find('episodes')->children()->slice(static::title(static::newest(), 3) - 1);
		
		$result = new StdClass();
		foreach($pages as $page) {
			if(static::title($page, 3) <= static::title(static::newest(), 3)) {
				continue;
			}
			
			$result = $page;
			break;
		}
		
		return static::nextData(static::$next = static::title($result, 3));
	}
	
	static function newest() {
		if(static::$newest) return site()->pages()->find('episodes/' . static::$newest);
		
		$pages = site()->pages()->find('episodes')->children()->flip();
		
		foreach($pages as $page) {
			$data = static::infos($page, true);
			
			if(!is_array($data) || !isset($data['media']['mp3']) || !isset($data['cover']['png']) || !$page->text() || !$page->title() || !$page->shownotes()) continue;
			
			return site()->pages()->find('episodes/' . static::$newest = static::title($page, 3));
		}
	}
	
	static function title($episode, $version=0) {
		$episodeComponents = explode('/', $episode->uri());
		
		if(!isset($episodeComponents[1])) {
			return $episode->title();
		}
		
		$episodeString = $episodeComponents[1];
		$episodeID     = (int)$episodeString;
		
		switch($version) {
			case 0:
				return "#$episodeID ({$episode->title()})";
			case 1:
				return "#$episodeID <br>({$episode->title()})";
			case 2:
				return $episodeID;
			case 3:
				return $episodeString;
			case 4:
				return "Denken++ #$episodeID ({$episode->title()})";
		}
	}
	
	static function infos($episode, $raw=false) {
		if(isset(static::$episodes[$episode->uri()]) && $episodeData = static::$episodes[$episode->uri()]) {
			return ($raw)? $episodeData : static::objectify($episodeData);
		}
		
		$episodeID = static::title($episode, 2);
		
		$json = @file_get_contents("http://media.plusplus.serpens.uberspace.de/denken/$episodeID");
		$data = json_decode($json, true);
		
		static::$episodes[$episode->uri()] = $data;
		
		return ($raw)? $data : static::objectify($data);
	}
	
	private static function nextData($id) {
		$page = site()->pages()->find("episodes/$id");
		
		$timestamp = @strtotime($page->live());
		
		$state = STATE_NO;
		$live  = "";
		if($timestamp + 5400 <= time()) {
			$state = STATE_RECORDED;
		} else if($timestamp <= time()) {
			$state = STATE_LIVE;
		} else {
			$state = STATE_SOON;
			if($timestamp % 3600) {
				$live = strftime('%A ~%H:%M Uhr', $timestamp);
			} else {
				$live = strftime('%A ~%H Uhr', $timestamp);
			}
		}
		
		static::$nextInfos         = new StdClass();
		static::$nextInfos->state  = $state;
		static::$nextInfos->live   = $live;
		static::$nextInfos->id     = static::title(static::newest(), 2) + 1;
		static::$nextInfos->number = '#' . static::$nextInfos->id;
		
		$page->infos = static::$nextInfos;
		
		return $page;
	}
	
	private static function objectify($data) {
		$obj = new StdClass();
		$obj->image = isset($data['cover']['png'])?  $data['cover']['png'] : null;
		
		$obj->m4a   = isset($data['media']['m4a'])?  $data['media']['m4a'] : null;
		$obj->mp3   = isset($data['media']['mp3'])?  $data['media']['mp3'] : null;
		$obj->ogg   = isset($data['media']['ogg'])?  $data['media']['ogg'] : null;
		$obj->opus  = isset($data['media']['opus'])? $data['media']['opus'] : null;
		$obj->media = $data['media'];
		
		$obj->infos = $data['infos'];
		
		return $obj;
	}
}
Episodes::loadCache();

register_shutdown_function(function() {
	if(!c::get('cache.episodes', false)) return;
	
	$data = array(
		Episodes::$newest,
		Episodes::$next,
		Episodes::$episodes
	);
	file_put_contents(ROOT_SITE_CACHE . '/episodes.ser', serialize($data));
});

function bytesToSize($bytes, $precision = 2) {  
	$kilobyte = 1024;
	$megabyte = $kilobyte * 1024;
	$gigabyte = $megabyte * 1024;
	$terabyte = $gigabyte * 1024;

	if (($bytes >= 0) && ($bytes < $kilobyte)) {
		return $bytes . ' Bytes';
	} elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
		return round($bytes / $kilobyte, $precision) . ' kB';
	} elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
		return round($bytes / $megabyte, $precision) . ' MB';
	} elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
		return round($bytes / $gigabyte, $precision) . ' GB';
	} elseif ($bytes >= $terabyte) {
		return round($bytes / $terabyte, $precision) . ' TB';
	} else {
		return $bytes . ' Bytes';
	}
}

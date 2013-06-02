<?php

// direct access protection
if(!defined('KIRBY')) die('Direct access is not allowed');

/*

---------------------------------------
Debug 
---------------------------------------

Set this to true to enable php errors. 
Make sure to keep this disabled for your 
production site, so you won't get nasty 
php errors there.

*/

c::set('debug', true);

/*

---------------------------------------
Cache 
---------------------------------------

Enable or disable the cache. 
It is disabled by default. 

If you enable it, you need to make 
sure that the site/cache
directory is writable. 

You can also decide to disable/enable
either caching the final html. 
If you are caching the final html, 
make sure to clean the cache, once 
you've modified your templates. 
It's better to keep this off until your 
site is ready for production. 

With c::set('cache.autoupdate') you can set if 
Kirby will automatically check for updates in your 
content folder. Depending on the size of your site
this can slow down the performance, because the 
filesystem is accessed a lot. Switch this off to 
disabled autoupdating of cache files, but then you 
need to make sure to delete cache files yourself after
each update. 

With c::set('cache.ignore.urls', array()); you can speficy
an array of URIs which should be skipped for caching.
If you got a search page for example you might not want
to cache each search result so you can add the URI of your
search site to the ignore array: 

c::set('cache.ignore', array('search', 'some/other/uri/to/ignore', 'projects/*'));

With c::set('cache.ignore.templates', array()); you can specify
templates which shouldn't be cached.

*/

c::set('cache', false);
c::set('cache.autoupdate', false);
c::set('cache.html', false);
c::set('cache.ignore.urls', array());
c::set('cache.ignore.templates', array());

c::set('cache.episodes', false);

<?php
# This file was automatically generated by the MediaWiki 1.36.0-alpha
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Include platform/distribution defaults
require_once "$IP/includes/PlatformSettings.php";

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "MediaWiki";
$wgMetaNamespace = "Project";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/w";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "http://localhost:8080";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ '1x' => "$wgResourceBasePath/resources/assets/wiki.png" ];

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@localhost";
$wgPasswordSender = "apache@localhost";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "sqlite";
$wgDBserver = "";
$wgDBname = "my_wiki";
$wgDBuser = "";
$wgDBpassword = "";

# SQLite-specific settings
$wgSQLiteDataDir = "/var/www/html/w/cache/sqlite";
$wgObjectCaches[CACHE_DB] = [
	'class' => SqlBagOStuff::class,
	'loggroup' => 'SQLBagOStuff',
	'server' => [
		'type' => 'sqlite',
		'dbname' => 'wikicache',
		'tablePrefix' => '',
		'variables' => [ 'synchronous' => 'NORMAL' ],
		'dbDirectory' => $wgSQLiteDataDir,
		'trxMode' => 'IMMEDIATE',
		'flags' => 0
	]
];
$wgLocalisationCacheConf['storeServer'] = [
	'type' => 'sqlite',
	'dbname' => "{$wgDBname}_l10n_cache",
	'tablePrefix' => '',
	'variables' => [ 'synchronous' => 'NORMAL' ],
	'dbDirectory' => $wgSQLiteDataDir,
	'trxMode' => 'IMMEDIATE',
	'flags' => 0
];
$wgJobTypeConf['default'] = [
	'class' => 'JobQueueDB',
	'claimTTL' => 3600,
	'server' => [
		'type' => 'sqlite',
		'dbname' => "{$wgDBname}_jobqueue",
		'tablePrefix' => '',
		'variables' => [ 'synchronous' => 'NORMAL' ],
		'dbDirectory' => $wgSQLiteDataDir,
		'trxMode' => 'IMMEDIATE',
		'flags' => 0
	]
];

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale. This should ideally be set to an English
## language locale so that the behaviour of C library functions will
## be consistent with typical installations. Use $wgLanguageCode to
## localise the wiki.
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "741b629bdc00e3c1ba9465e790b6106389fdc5e1548a1e293295dfda6a2e7ecc";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "0a5578677d71c617";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'Vector' );

# End of automatically generated settings.
# Add more configuration options below.

# =============================================================================
# Settings helpful to the Web team's work follow:
# =============================================================================

# Default logging to mw-debug-www.log is incredibly noisy. Redirect
# the db logging to mw-database.log instead.
$wgDebugLogGroups = [
	'DBQuery' => 'cache/mw-database.log',
	'DBConnection' => 'cache/mw-database.log',
	'DBPerformance' => 'cache/mw-database.log',
	'DBReplication' => 'cache/mw-database.log',
	'objectcache' => 'cache/mw-database.log',
];

# Defaults Vector to latest skin for anonymous users instead of legacy.
$wgVectorDefaultSkinVersion = '2';

# Content Provider used to show articles from enwiki. Can be helpful when trying to see how
# production articles look locally, but be aware that there are some gotchas
# with using this that don't perfectly match the production environment. Use at
# your own discretion!
/* $wgMFAlwaysUseContentProvider = true; */
/* $wgMFContentProviderClass = 'MobileFrontend\ContentProviders\MwApiContentProvider'; */
/* $wgMFMwApiContentProviderBaseUri = 'https://en.wikipedia.org/w/api.php'; */
/* $wgMFContentProviderScriptPath = 'https://en.wikipedia.org/w'; */
/* $wgMFContentProviderTryLocalContentFirst = true; */

$wgLogos = [
	'icon' => 'https://en.wikipedia.org/static/images/mobile/copyright/wikipedia.png',
	'tagline' => [
		'src' => 'https://en.wikipedia.org/static/images/mobile/copyright/wikipedia-tagline-en.svg',
		'width' => 117,
		'height' => 13,
	],
	'1x' => 'https://en.wikipedia.org/static/images/project-logos/enwiki.png',
	'2x' => 'https://en.wikipedia.org/static/images/project-logos/enwiki-2x.png',
	'wordmark' => [
		'src' => 'https://en.wikipedia.org/static/images/mobile/copyright/wikipedia-wordmark-en.svg',
		'width' => 119,
		'height' => 18,
	],
];

// T152540: Dictates how the parser escapes section ids. Mirrors how it works
// on enwiki.
$wgFragmentMode = [ 'html5', 'legacy' ];

# MobileFrontend and Minerva
wfLoadExtension( 'Cite' );
wfLoadExtension( 'MobileFrontend' );
wfLoadSkin( 'MinervaNeue' );

# Popups
$wgPopupsGateway = 'restbaseHTML';
$wgPopupsRestGatewayEndpoint = 'https://en.wikipedia.org/api/rest_v1/page/summary/';
wfLoadExtension( 'Popups' );

# Echo
wfLoadExtension( 'Echo' );

// This is the eventgate-devserver URI.
// Set this to wherever you are running eventgate-devserver
// at an address that your browser can access.
$wgEventLoggingServiceUri = 'http://localhost:8192/v1/events';

// By default EventLogging waits 30 seconds before sending
// batches of queued events.  That's annoying in a dev env.
$wgEventLoggingQueueLingerSeconds = 1;

// By settings $wgEventLoggingStreamNames to false, we instruct EventLogging
// to not use any EventStreamConfig. Instead, all streams will be seen as
// if they are configured and registered. See the EventStreamConfig
// [README](https://gerrit.wikimedia.org/r/plugins/gitiles/mediawiki/extensions/EventStreamConfig/+/master/README.md//mediawiki-config)
// for instructions on how to set up stream config.
$wgEventLoggingStreamNames = false;
// If you do configure stream config in $wgEventStreams, you'll
// need to register those streams for use by EventLogging, e.g.
// $wgEventLoggingStreamNames = ['my.stream.name'];

// Point to eventgate dev server. Running in docker container on
// mac so use host.docker.internal to connect to eventgate server
// running on host.
$wgEventServices = [
	'eventgate' => [ 'url' => 'http://host.docker.internal:8192/v1/events' ]
];

$wgEventServiceDefault = 'eventgate';

# Turn off when running PHPUnit tests (the tests will complain if you don't).
$wgEnableEventBus = 'TYPE_ALL';

# EventLogging
# Note: In order for EventLoggging to pick up your local schemas, make sure
# EventLogging/devserver/eventgate.config.yaml `schema_base_uris` point to: 
# - ../repositories/secondary/jsonschema
wfLoadExtension( 'EventLogging' );
# EventLogging requires EventBus
wfLoadExtension( 'EventBus' );
# EventLogging requires EventStreamConfig
wfLoadExtension( 'EventStreamConfig' );
wfLoadExtension( 'WikimediaEvents' );

# Universal Language Selector
$wgULSPosition = 'interlanguage';
$wgULSCompactLanguageLinksBetaFeature = false;
wfLoadExtension( 'UniversalLanguageSelector' );

# Language
$wgVectorLanguageInHeader = true;
# Useful when testing language variants
$wgUsePigLatinVariant = true;

# WVUI Search
$wgVectorUseWvuiSearch = true;
$wgVectorSearchHost = 'en.wikipedia.org';
$wgVectorWvuiSearchOptions = [
	"showThumbnail" => true,
	"showDescription" => true
];

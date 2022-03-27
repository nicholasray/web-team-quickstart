<?php
# This file was automatically generated by the MediaWiki 1.37.0-alpha
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

use function Symfony\Component\String\u;

if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "my_wiki";
$wgMetaNamespace = "My_wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

## The protocol and server name to use in fully-qualified URLs
$wgServer = WebRequest::detectServer();;

## The URL path to static resources (images, scripts, etc.)
// $wgResourceBasePath = "$wgServer";

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ '1x' => "$wgResourceBasePath/resources/assets/wiki.png" ];

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@🌻.invalid";
$wgPasswordSender = "apache@🌻.invalid";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "127.0.0.1";
$wgDBname = "my_wiki";
$wgDBuser = "root";
$wgDBpassword = "sqlpass";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

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
$wgShellLocale = "en_US.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "9a30dfdecb50680cd1384e34eb801c0842c636a9b72621ce92cc5393dd6faea1";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "1df4f944a6af6825";

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

# End of automatically generated settings.
# Add more configuration options below.

# ============================================================================
# Personal options follow:
# ============================================================================
$wgEnableJavaScriptTest = true;

$wgShowExceptionDetails = true;
/* error_reporting( -1 ); */
/* ini_set( 'display_errors', 0 ); */

wfLoadSkin( 'Vector' );

# Default logging to mw-debug-www.log is incredibly noisy. Redirect
# the db logging to mw-database.log instead.
# WARNING: Enabling logging to mw-www-debug and mw-database has serious
# performance costs! Only enable when necessary.
// $wgDebugLogFile = 'cache/mw-www-debug.log';
$wgDebugLogGroups = [
	/* 'DBQuery' => 'cache/mw-database.log', */
	/* 'DBConnection' => 'cache/mw-database.log', */
	/* 'DBPerformance' => 'cache/mw-database.log', */
	/* 'DBReplication' => 'cache/mw-database.log', */
	/* 'objectcache' => 'cache/mw-database.log', */
	'console' => 'cache/mw-console.log',
];

# Content Provider used to show articles from enwiki. Can be helpful when trying to see how
# production articles look locally, but be aware that there are some gotchas
# with using this that don't perfectly match the production environment. Use at
# your own discretion!
$wgMFContentProviderClass = "MobileFrontendContentProviders\\MwApiContentProvider";
wfLoadExtension( 'MobileFrontendContentProvider' );

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
$wgMFUseDesktopSpecialHistoryPage = [ // T219895
	'base' => false,
	'beta' => false,
	'amc' => true,
];

$wgMFUseDesktopContributionsPage = [
	'base' => false,
	'beta' => false,
	'amc' => true,
];

wfLoadExtension( 'MobileFrontend' );
wfLoadSkin( 'MinervaNeue' );

# Popups
$wgPopupsGateway = 'restbaseHTML';
$wgPopupsRestGatewayEndpoint = 'https://en.wikipedia.org/api/rest_v1/page/summary/';
$wgArticlePath = "/wiki/$1";
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

// Point to eventgate dev server.
$wgEventServices = [
	'eventgate' => [ 'url' => 'http://localhost:8192/v1/events' ]
];

$wgEventServiceDefault = 'eventgate';

# Turn off when running PHPUnit tests (the tests will complain if you don't).
$wgEnableEventBus = 'TYPE_ALL';

$wgWMEVectorPrefDiffSalt = 'secret';
// $wgEventStreams = [
// 	[
// 	'stream' => 'mediawiki.skin_diff',
// 	'schema_title' => 'analytics/pref_diff',
// 	'canary_events_enabled' => true,
// 	'destination_event_service' => 'eventgate',
// 	],
// ];
//
// $wgEventStreams = [
// 	[
// 		'stream' => 'mediawiki.reading_depth',
// 		'schema_title' => 'analytics/mediawiki/web_ui_reading_depth',
// 		'canary_events_enabled' => true,
// 		'destination_event_service' => 'eventgate',
// 	]
// ];

// $wgEventLoggingStreamNames = [
// 		'mediawiki.skin_diff',
// 		// 'mediawiki.reading_depth'
// ];

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

# WVUI Search
$wgVectorUseWvuiSearch = true;
$wgVectorWvuiSearchOptions = [
	"showThumbnail" => true,
	"showDescription" => true
];
// $wgVectorSearchHost = 'en.wikipedia.org';

# Universal Language Selector
$wgULSPosition = 'interlanguage';
$wgULSCompactLanguageLinksBetaFeature = false;
wfLoadExtension( 'UniversalLanguageSelector' );

# Useful when testing language variants
$wgUsePigLatinVariant = true;

# Languages
$wgVectorLanguageInHeader = [
	'logged_in' => true,
	'logged_out' => true,
];
$wgVectorLanguageInMainPageHeader = [
	"logged_in" => false,
	"logged_out" => false,
];
$wgVectorLanguageAlertInSidebar =[
	'logged_in' => true,
	'logged_out' => true
];
$wgVectorLanguageInHeaderTreatmentABTest = false;

# GlobalPreferences
$wgSharedTables = [ 'user' ]; // Note that 'user_properties' is not included.
wfLoadExtension( 'GlobalPreferences' );

# Gadgets
wfLoadExtension( 'Gadgets' );

// wfLoadExtension( 'QuickSurveys' );

// const QS_ANSWERS_MULTI_CHOICE =  [
// 	'ext-quicksurveys-example-internal-survey-answer-positive',
// 	'ext-quicksurveys-example-internal-survey-answer-neutral',
// 	'ext-quicksurveys-example-internal-survey-answer-negative'
// ];

// // Applies to all surveys
// const QS_DEFAULTS = [
// 	// Who is the survey for? All fields are optional.
// 	'audience' => [
// 		'minEdits' => 0,
// 		'anons' => false,
// 		'maxEdits' => 500,
// 		'registrationStart' => '2018-01-01',
// 		'registrationEnd' => '2080-01-31',
// 		// You must have CentralNotice extension installed in order to limit audience by country
// 		// 'countries' => [ 'US', 'UK' ]
// 	],
// 	// The i18n key of the privacy policy text
// 	'privacyPolicy' => 'ext-quicksurveys-example-external-survey-privacy-policy',
// 	// Whether the survey is enabled
// 	'enabled' => true,
// 	// Percentage of users that will see the survey
// 	'coverage' => 1,
// 	// For each platform (desktop, mobile), which version of it is targeted
// 	'platforms' => [
// 		'desktop' => [ 'stable' ],
// 		'mobile' => [ 'stable' ]
// 	],
// ];

// $wgQuickSurveysConfig = [
// 	// Example of an internal survey
// 	[
// 		// Survey name
// 		'name' => 'internal example survey',
// 		// Internal or external link survey?
// 		'type' => 'internal',
// 		// The respondent can choose one answer from a list.
// 		'layout' => 'single-answer',
// 		// Survey question message key
// 		'question' => 'ext-quicksurveys-example-internal-survey-question',
// 		// The message key of the description of the survey. Displayed immediately below the survey question.
// 		//'description' => 'ext-quicksurveys-example-internal-survey-description',
// 		// Possible answer message keys for positive, neutral, and negative
// 		'answers' => QS_ANSWERS_MULTI_CHOICE,
// 		// Label for the optional free form text answer
// 		'freeformTextLabel' => 'ext-quicksurveys-example-internal-survey-freeform-text-label',
// 		// Whether to shuffle the display of the answers
// 		'shuffleAnswersDisplay' => true,
// 	] + QS_DEFAULTS,

// 	[
// 		// Survey name
// 		'name' => 'internal multi answer example survey',
// 		// Internal or external link survey?
// 		'type' => 'internal',
// 		// The respondent can choose one answer from a list.
// 		'layout' => 'multiple-answer',
// 		// Survey question message key
// 		'question' => 'ext-quicksurveys-example-internal-survey-question',
// 		// The message key of the description of the survey. Displayed immediately below the survey question.
// 		//'description' => 'ext-quicksurveys-example-internal-survey-description',
// 		// Possible answer message keys for positive, neutral, and negative
// 		'answers' => QS_ANSWERS_MULTI_CHOICE,
// 		// Label for the optional free form text answer
// 		'freeformTextLabel' => 'ext-quicksurveys-example-internal-survey-freeform-text-label',
// 		// Whether to shuffle the display of the answers
// 		'shuffleAnswersDisplay' => true,
// 		'targetAudience' => [
// 			'os' => [ 'KaiOS' ]
// 		]
// 	] + QS_DEFAULTS,
// 	// Example of an external survey
// 	[
// 		'name' => 'external example survey',
// 		// Internal or external link survey
// 		'type' => 'external',
// 		// Survey question message key
// 		'question' => 'ext-quicksurveys-example-external-survey-question',
// 		// The i18n key of the description of the survey
// 		'description' => 'ext-quicksurveys-example-external-survey-description',
// 		// External link to the survey
// 		'link' => 'ext-quicksurveys-example-external-survey-link',
// 		// Parameter to add to external link
// 		'instanceTokenParameterName' => 'parameterName',
// 	] + QS_DEFAULTS,
// ];

wfLoadExtension( 'BetaFeatures' );

// wfLoadExtension( 'CentralNotice' );
// $wgNoticeInfrastructure = true;
// $wgNoticeProjects = array( 'centralnoticeproject' ); # 'centralnoticeproject' can be any string
// $wgNoticeProject = 'centralnoticeproject'; # must be the same as above
// $wgCentralHost = 'localhost';
// $wgCentralSelectedBannerDispatcher = 'http://localhost/mw/index.php?title=Special:BannerLoader';
// $wgCentralDBname = $wgDBname; # the same as $wgDBname
// $wgCentralNoticeGeoIPBackgroundLookupModule = 'ext.centralNotice.freegeoipLookup';

$wgHooks['SkinTemplateNavigation::Universal'][] = function ( $skinTemplate, &$links ) {
        $links['user-menu']['jonlink'] = [
                'link-class' => [ 'jr' ],
                'class' => [ 'jr2' ],
                'text' => 'I am an extension',
                'href' => 'https://jdlrobson.com'
        ];
};

$wgVectorStickyHeader = [
	'logged_in' => true,
	'logged_out' => false 
];

// wfLoadExtension( 'RelatedArticles' );
// $wgRelatedArticlesFooterWhitelistedSkins = ['minerva'];

wfLoadExtension( 'Parsoid', "vendor/wikimedia/parsoid/extension.json" );
wfLoadExtension( 'VisualEditor' );
// Needed to prevent: RuntimeException: strtolower() doesn't work -- please set the locale to C or a UTF-8 variant such as C.UTF-8.
$wgShellLocale = "C";
$wgDefaultUserOptions['visualeditor-enable'] = 1;
$wgEnableRestAPI = true;
$wgGroupPermissions['user']['writeapi'] = true;

$wgWMEWebUIScrollTrackingSamplingRate = 1;
$wgWMEWebUIScrollTrackingTimeToWaitBeforeScrollUp = 0;
$wgWMEMobileWebUIActionsTracking = 1;
$wgWMEReadingDepthSamplingRate = 1;

$wgVectorWebABTestEnrollment = [
	'name' => 'skin-vector-toc-experiment',
	'enabled' => true,
	'buckets' => [
		'unsampled' => [
			'samplingRate' => 0
		],
		'control' => [
			'samplingRate' => 0.5
		],
		'treatment' => [
			'samplingRate' => 0.5
		],
	]
];

// $wgVectorWebABTestEnrollment = [
// 	'name' => 'vector.sticky_header',
// 	'enabled' => false,
// 	'buckets' => [
// 		'unsampled' => [
// 			'samplingRate' => 0
// 		],
// 		'control' => [
// 			'samplingRate' => 0
// 		]
// 		'stickyHeaderDisabled' => [
// 			'samplingRate' => 0
// 		],
// 		'stickyHeaderEnabledTreatment' => [
// 			'samplingRate' => 1
// 		],
// 	]
// ];

$wgVectorSkinMigrationMode = true;

// $wgParserCacheType = CACHE_NONE;
$wgVectorTableOfContents = [
	"default" => true,
	// "experiment" => [
	// 	"enabled" => true,
	// 	"strategy" => "articleId",
	// 	"samplingRatio" => 1,
	// 	"buckets" => [ "control", "treatment" ]
	// ]
];

$wgVectorTableOfContentsCollapseAtCount = 20;

<?php

$wgExtensionCredits['other'][] = array(
	'name' => 'TwitterSidebarFeed',
	'author' =>'Simon Walker', 
	'url' => 'http://www.mediawiki.org/wiki/User:Stwalkerster', 
	'description' => 'Provides the live twitter feed in the sidebar'
	);

$wgHooks['SkinBuildSidebar'][] = 'twitterSidebarFeedSkinBuildSidebarHandler';
 
$wgTwitterSidebarFeedUser = 'twitter';
$wgTwitterSidebarFeedShellBackground = '#333333';
$wgTwitterSidebarFeedShellColor = '#ffffff';
$wgTwitterSidebarFeedTweetsBackground = '#000000';
$wgTwitterSidebarFeedTweetsColor = '#ffffff';
$wgTwitterSidebarFeedTweetsLinks = '#4aed05';
 
function twitterSidebarFeedSkinBuildSidebarHandler( $skin, &$bar ) {
	global $wgTwitterSidebarFeedUser, $wgTwitterSidebarFeedShellBackground, $wgTwitterSidebarFeedShellColor;
	global $wgTwitterSidebarFeedTweetsBackground, $wgTwitterSidebarFeedTweetsColor, $wgTwitterSidebarFeedTweetsLinks;
	

	$out = '<div id="pTwitterBody" class="pBody">'."\n";
	$out .= "<script src=\"https://widgets.twimg.com/j/2/widget.js\"></script>";
	$out .= "<script> ";
	$out .= "new TWTR.Widget({";
	$out .= "  version: 2,";
	$out .= "  type: 'profile',";
	$out .= "  rpp: 4,";
	$out .= "  interval: 6000,";
	$out .= "  width: 'auto',";
	$out .= "  height: 300,";
	$out .= "  theme: {";
	$out .= "    shell: {";
	$out .= "      background: '$wgTwitterSidebarFeedShellBackground',";
	$out .= "      color: '$wgTwitterSidebarFeedShellColor'";
	$out .= "    },";
	$out .= "    tweets: {";
	$out .= "      background: '$wgTwitterSidebarFeedTweetsBackground',";
	$out .= "      color: '$wgTwitterSidebarFeedTweetsColor',";
	$out .= "      links: '$wgTwitterSidebarFeedTweetsLinks'";
	$out .= "    }";
	$out .= "  },";
	$out .= "  features: {";
	$out .= "    scrollbar: true,";
	$out .= "    loop: false,";
	$out .= "    live: true,";
	$out .= "    hashtags: true,";
	$out .= "    timestamp: true,";
	$out .= "    avatars: true,";
	$out .= "    behavior: 'all'";
	$out .= "  }";
	$out .= "}).render().setUser('$wgTwitterSidebarFeedUser').start();";
	$out .= "</script> ";
	$out .= "</div>";
	$bar[ 'Twitter' ] = $out;
	return true;
}

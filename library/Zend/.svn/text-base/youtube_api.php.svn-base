<?php
require_once 'Zend/Loader.php'; // the Zend dir must be in your include_path
Zend_Loader::loadClass('Zend_Gdata_YouTube');
$yt = new Zend_Gdata_YouTube();

//header( "Content-Type: text/xml" );

$userName = isset($_GET['userName'])?$_GET['userName']:"adrienwb";
$method = isset($_GET['method'])?$_GET['method']:"";
$idList = isset($_GET['idList'])?$_GET['idList']:"";

var_dump(getAndPrintUserUploads($userName));

function getAndPrintUserUploads($userName)                    
{     
  $yt = new Zend_Gdata_YouTube();
  printVideoFeed($yt->getuserUploads($userName));
}

function printVideoFeed($videoFeed) 
{
  $count = 1;
  foreach ($videoFeed as $videoEntry) {
    echo 'Entry # ' . $count . "<br />";
    printVideoEntry($videoEntry);
    echo "<br />";
    $count++;
  }
}

function printVideoEntry($videoEntry) 
{
  // the videoEntry object contains many helper functions that access the underlying mediaGroup object
  echo 'Video: ' . $videoEntry->getVideoTitle() . "<br />";
  echo 'Video ID: ' . $videoEntry->getVideoId() . "<br />";
  echo 'Updated: ' . $videoEntry->getUpdated() . "<br />";
  echo 'Description: ' . $videoEntry->getVideoDescription() . "<br />";
  echo 'Category: ' . $videoEntry->getVideoCategory() . "<br />";
  echo 'Tags: ' . implode(", ", $videoEntry->getVideoTags()) . "<br />";
  echo 'Watch page: ' . $videoEntry->getVideoWatchPageUrl() . "<br />";
  echo 'Flash Player Url: ' . $videoEntry->getFlashPlayerUrl() . "<br />";
  echo 'Duration: ' . $videoEntry->getVideoDuration() . "<br />";
  echo 'View count: ' . $videoEntry->getVideoViewCount() . "<br />";
  echo 'Rating: ' . $videoEntry->getVideoRatingInfo() . "<br />";
  echo 'Geo Location: ' . $videoEntry->getVideoGeoLocation() . "<br />";
  
  // see the paragraph above this function for more information on the 'mediaGroup' object
  // here we are using the mediaGroup object directly to its 'Mobile RSTP link' child
 foreach ($videoEntry->mediaGroup->content as $content) {
    if ($content->type === "video/3gpp") {
      echo 'Mobile RTSP link: ' . $content->url . "<br />";
    }
  }
  
  echo "Thumbnails:<br />";
  $videoThumbnails = $videoEntry->getVideoThumbnails();

  foreach($videoThumbnails as $videoThumbnail) {
    echo $videoThumbnail['time'] . ' - ' . $videoThumbnail['url'];
    echo ' height=' . $videoThumbnail['height'];
    echo ' width=' . $videoThumbnail['width'] . "\n";
  }
}
?>   
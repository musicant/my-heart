<?php
require_once 'Zend/Service/Flickr.php';

header( "Content-Type: text/xml" );

define(API_KEY,'095a622d30d7dcb2389b6e3c2f0a8016');
$userEmail = isset($_GET['userEmail'])?$_GET['userEmail']:"adrienwb@yahoo.com";
$method = isset($_GET['method'])?$_GET['method']:"";
$idList = isset($_GET['idList'])?$_GET['idList']:"";

$flickr = new Zend_Service_Flickr(API_KEY);

$results = $flickr->userSearch($userEmail);

$xml = '<flickr>';
switch ($method) {

  // method for getting all the photos of a user
  case "getAll":

  $xml .= '<user_email>'.$userEmail.'</user_email>';
  $results = $flickr->userSearch($userEmail);
  $totalResultsAvailable = $results->totalResultsAvailable;
  $xml .= '<total>'.$totalResultsAvailable.'</total>';

  foreach ($results as $result) {
	$xml .= '<photo>';
	  $xml .= '<img_id>'.$result->id.'</img_id>';
	  $xml .= '<img_url>'.$result->Thumbnail->uri. '</img_url>';
	  $xml .= '<img_click>'.$result->Thumbnail->clickUri.'</img_click>';
      $xml .= '<img_title>'.$result->title . '</img_title>';
    $xml .= '</photo>';
  }
  break;

  // method for getting just some photos
  case "getSome":

  $idList = explode(',',$idList);
  foreach ($idList as $id) {
    $image = $flickr->getImageDetails($id);
	$xml .= '<photo>';
	  $xml .= '<img_url>'.$image['Large']->uri.'</img_url>';
	  $xml .= '<img_click>'.$image['Large']->clickUri.'</img_click>';
	  $xml .= '<img_height>'.$image['Large']->height.'</img_height>';
	  $xml .= '<img_width>'.$image['Large']->width.'</img_width>';
    $xml .= '</photo>';
  }


}

$xml .= '</flickr>';
echo $xml;

function saveFlickrPhoto($photoId,$photoUrl) {

}
?>   
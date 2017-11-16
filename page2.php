<?php
require_once("vendor/autoload.php");
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;


$pageUrl = 'https://www.facebook.com/mkhossaininfo/';  
      FacebookSession::setDefaultApplication('1446785365388047','8db3119160bb90b3154cd89bf91f8662');
    //getting session
    $Session = FacebookSession::newAppSession();
    try
    {
      //validating if session is correct
      $Session->validate();
      //sending request
      $Request = new FacebookRequest($Session, 'GET', '/',
                                      array (
                                        'id' => $pageUrl,
                                      )
                                    );
      $Response = $Request->execute();
      //getting UserGraph object
      $UserObject = $Response->getGraphObject(GraphUser::className());
      //return page id
      return $UserObject->GetId();
    }
    catch (FacebookRequestException $ex)
    {}
    catch (Exception $ex)
    {}
    
    // $info = json_decode(file_get_contents("https://graph.facebook.com/mkhossaininfo/"));
    // var_dump($info);
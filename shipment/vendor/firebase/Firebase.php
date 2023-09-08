<?php
 class Firebase{

  function curl_hit($post){
    //$apiKey = 'AIzaSyDlzCfuUTTUctII-C_KFA2VLZtuXpIbYjM';
    //$apiKey = 'AIzaSyBl6OLCThnqy0QrrrQRdlHu315tRUyRXZE';
   $apiKey = 'AAAARve3Ies:APA91bF6Aphryt2lA5e4zV0QmEXGo-CV95LR5wN469WNGq00QxAuZugjfcG8vh7pu2ovs4rOl2oJpdwXK2Jf2qFgoHavge-OaWkxoveCBH_v5qU7Vt5FuPeGMWpW5cZcLpgmYuLYPlu7';

      //$url = 'https://fcm.googleapis.com/fcm/send';
      $url = 'https://fcm.googleapis.com/fcm/send';

      $headers = array(
          'Authorization: key=' . $apiKey,
          'Content-Type: application/json'
      );

     // Initialize curl handle
      $ch = curl_init();

      // Set URL to GCM endpoint
      curl_setopt($ch, CURLOPT_URL, $url);

      // Set request method to POST
      curl_setopt($ch, CURLOPT_POST, true);

      // Set our custom headers
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      // Get the response back as string instead of printing it
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      // Set JSON post data
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));

      // Actually send the push
      $result = curl_exec($ch);
      
      // Close curl handle
      curl_close($ch);
      $result_de = json_decode($result);
   
      return (array)$result_de;
  }
  function firebaseCloudMessage($params,$message)
  {
	  
            switch ($params['type']){
                case 'assinOrder':
                   $notification_data = array( //when application open then post field 'data' parameter work so 'message' and 'body' key should have same text or value
                        'message'           => $message,
                        'meta_data'         => $params,//array('topic' => 'doggystroll'.$params['notifyWalkerId'])
                        'badge'             => $params['badgeCount']
                    );
                    break;
                case 'acceptOrder':
                     $notification_data = array( 
                        'message'           => $message,
                        'meta_data'           => $params,
                        'badge'             => $params['badgeCount']
                    );
                    break;
                case 'rejectOrder':
                 $notification_data = array( 
                    'message'           => $message,
                    'meta_data'           => $params,
                    'badge'             => $params['badgeCount']
                );
                    break;
          }
    
        $notification = array(       //// when application close then post field 'notification' parameter work
          'body'  => $message,
          'sound' => 'default',
          'badge' => $params['badgeCount']
      );

      /*---for android---*/
      $topic = "'sky2c".$params['notifyId']."' in topics";
      $post = array(
          'condition'         => $topic,
          'notification'      => $notification,
          "content_available" => true,
          'priority'          => 'high',
          'data'              => $notification_data
      );
     

      $notifyResult = $this->curl_hit($post);
     
      return array($notifyResult);
  }
  function firebaseCloudMessage_admin($params,$message, $topic)
  {
       //pr($params);echo $message;die;
           // pr($params);die;
          switch ($params['type']){
            case 'cancelBookingsByAdmin':
               $notification_data = array( //when application open then post field 'data' parameter work so 'message' and 'body' key should have same text or value
                    'message'           => $message,
                    'meta_data'         => $params,//array('topic' => 'doggystroll'.$params['notifyWalkerId']),
                    'badge'             => $params['badgeCount']
                );
                break;     
          }
    
        $notification = array(       //// when application close then post field 'notification' parameter work
          'body'  => $message,
          'badge' => $params['badgeCount'],
          'sound' => 'default'
      );

      $post = array(
          'condition'         => $topic,
          'notification'      => $notification,
          "content_available" => true,
          'priority'          => 'high',
          'data'              => $notification_data
      );
         //print_r($post);die;

      $notifyResult = $this->curl_hit($post);
      // print_r($notifyResult);die;
      return array($notifyResult);
  }
}
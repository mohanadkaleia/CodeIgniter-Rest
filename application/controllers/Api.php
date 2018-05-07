<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

    function file_get() {
      // Upload a file to the server
      $uploadDir = './files/';
      $fileName = underscore($_FILES['file']['name']);
      $uploadFile = $uploadDir.$fileName;

      $response['status'] = 'Success';
      $response['message'] = 'The file has been uploaded!';

      $this->response($response, REST_Controller::HTTP_OK);
    }

    function file_post() {
        // Upload a file to the server
        $uploadDir = './files/';
        $fileName = underscore($_FILES['file']['name']);
        $uploadFile = $uploadDir.$fileName;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            $response['status'] = 'Success';
            $response['message'] = 'The file has been uploaded!';
         } else {
            $response['status'] =  'Failure';
         }
        $this->response($response, REST_Controller::HTTP_OK);
		//$this->response($_FILES);
    }

    function file_delete() {

    }
}

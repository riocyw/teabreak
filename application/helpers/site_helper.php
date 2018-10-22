<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    function IDPromoGenerator()
      {
        date_default_timezone_set("Asia/Bangkok");
        $date = date("ymdHis");
        $id = "PR-".$date;
        return $id;
      }

      function IDDistribusiGenerator()
      {
      	date_default_timezone_set("Asia/Bangkok");
        $date = date("ymdHis");
        $id = "DS-".$date;
        return $id;
      }
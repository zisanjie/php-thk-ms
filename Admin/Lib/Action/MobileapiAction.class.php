<?php
class MobileapiAction extends PublicAction{
       //list车辆
       public function listCars(){ 


            $foods = M('Foods');
            $data_array = $foods->field(array('id','name','pic','price','describe'))->select();



          // for($i=0; $i<count($data_array); $i++){
          //   echo $data_array[$i]["id"];
          // }
          //  print_r($data);

          $dom=new DomDocument('1.0', 'utf-8');
          $dom->formatOutput = true;
          $article = $dom->createElement('cars');
          $dom->appendchild($article);

          foreach ($data_array as $data) {
              $item = $dom->createElement('item');
              $article->appendchild($item);

              if (is_array($data)) {
                foreach ($data as $key => $val) {

                   $$key = $dom->createElement($key);
                   $item->appendchild($$key);

                   $text = $dom->createTextNode($val);
                   $$key->appendchild($text);

                }
             } 
          }
         echo $dom->saveXML();

       }


       //list订单
       public function listForms(){ 


        $foods = M('Forms');
        $uid = session('uid');
        $data_array = $foods
                      ->where('uid='.$uid)
                      ->field(array('id','form_number','nprice','ask','status'))
                      ->select();

        $dom=new DomDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $article = $dom->createElement('forms');
        $dom->appendchild($article);

        foreach ($data_array as $data) {
          $item = $dom->createElement('item');
          $article->appendchild($item);

          if (is_array($data)) {
            foreach ($data as $key => $val) {

             $$key = $dom->createElement($key);
             $item->appendchild($$key);

             $text = $dom->createTextNode($val);
             $$key->appendchild($text);

           }
         } 
       }
       echo $dom->saveXML();

     }

}
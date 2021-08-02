<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Devices;
use GuzzleHttp\Client;

class ipadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('ipad.create');
    }
    public function show($id){
        $client = new Client();
        $res = $client->request('POST', 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi', [
            'form_params' => [
                'access_key' => 'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
                'action' => 'get_data',
                'app_id' => '@tanmatu_test',
                'data_id' => $id,
                'fields' => [
                    '{"field_name":"端末種類"}',
                    '{"field_name":"管理番号"}',
                    '{"field_name":"自治体"}',
                    '{"field_name":"状態"}'
                ],
            ],

        ]);

        $photo = $res->getBody();

        return $photo ?? abort(404);
    }
    public function list(){

        $client = new Client();
        $res = $client->request('POST', 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi', [
            'form_params' => [
                'access_key' => 'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
                'action' => 'list_data',
                'app_id' => '@tanmatu_test',
                'fields' => [
                    '{"field_name":"端末種類"}',
                    '{"field_name":"管理番号"}',
                    '{"field_name":"自治体"}',
                    '{"field_name":"状態"}'
                ],
            ],

        ]);

        // 'application/json; charset=utf8'
       // echo $res->getBody();
        if ($res->getStatusCode() == 200) { // 200 OK
           // $res->getHeader('application/json');
            $response_data = $res->getBody();
        //echo $response_data;
            $json = json_decode($response_data,true);
           //$json = json_encode($response_data, JSON_UNESCAPED_UNICODE);
       //    echo $json->list;
            }
            $devices=['device'=> $response_data];
            //echo $data;
         //   echo '<script>';
         //   echo 'console.log('.json_encode($devices).')';
         //   echo '</script>';
            return $response_data;


    }
    public function list2(){
        $url = 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi';
        $params = array('access_key'=>'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
                            'action'=>'list_data','app_id'=>'@tanmatu_test',
                            'fields'=>'[{"field_name":"端末種類"},{"field_name":"管理番号"},{"field_name":"自治体"},{"field_name":"状態"}]');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

        $res = curl_exec($ch);
        $result = json_decode($res,true);
      //  echo $result->list->item;
        // セッションを終了
        curl_close($ch);


        $data=['records'=>$result["list"]["item"]];
        //$data=json_encode($data);
        //echo $data;

        return view('ipad.list', $data);


    }
    public function device_list(){

        $devices = Devices:: all();

        return $devices;

    }
    public function suggest1(){
        $client = new Client();
        $res = $client->request('POST', 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi', [
            'form_params' => [
                'access_key' => 'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
                'action' => 'list_data',
                'app_id' => '@tanmatu_test',
                'fields' => [
                    '{"field_name":"管理番号"}',
                ],
            ],

        ]);
        $response_data = $res->getBody();
        $result = json_decode($response_data,true);
        //var_dump($result["list"]["item"]);

        $devices = $result["list"]["item"];
        $hairetu=[];
        foreach($devices as $device){
            array_push($hairetu,$device["管理番号"]["val"]);
        }

        return $hairetu;

    }
    public function suggest2(){

        $devices = Devices:: all()->pluck('devicename');;

        return $devices;

    }
    public function store()
    {
      //  $this->validate($req, ipad::$rules);


        $url = 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi';
        $params = array('access_key'=>'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
            'action'=>'insert_data','app_id'=>'@tanmatu_test',
            '{{name}}'=>'ipad(第8世代)',
            '{{シリアルNo}}'=>'2022-XXXXX',
            '{{所属}}'=>'XX中学校',
            '{{ステータス}}'=>'修理中');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

        $res = curl_exec($ch);
        $result = json_decode($res,true);
        //  echo $result->list->item;
        // セッションを終了
        curl_close($ch);


        $data=['records'=>$result];
        //$data=json_encode($data);
      //  echo $data;

        //return view('ipad.list', $data);


        //$pad = new ipad();
       // if($req->person=='先生'){
       //     $pad->passcode = '3200';
      //  }else{
       //     $pad->passcode = '0000';
       // }
       // $pad->fill($req->except('_token'))->save();

        /* $b->isbn = $req->isbn;
         $b->title = $req->title;
         $b->price = $req->price;
         $b->publisher = $req->publisher;
         $b->published = $req->published;
         $b->save(); */

        return redirect('ipad/create');
    }
//     public function store(Request $req)
//     {
//         $this->validate($req, ipad::$rules);


//         $pad = new ipad();
//         if($req->person=='先生'){
//             $pad->passcode = '3200';
//         }else{
//             $pad->passcode = '0000';
//         }
//         $pad->fill($req->except('_token'))->save();

//         /* $b->isbn = $req->isbn;
//          $b->title = $req->title;
//          $b->price = $req->price;
//          $b->publisher = $req->publisher;
//          $b->published = $req->published;
//          $b->save(); */

//         return redirect('ipad/create');
//     }
}

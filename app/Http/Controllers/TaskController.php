<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $url = 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi';
        $params = array('access_key'=>'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
            'action'=>'list_data','app_id'=>'@anken_test',
            'fields'=>'[{"field_name":"案件No"},{"field_name":"担当者名"},{"field_name":"学校"},{"field_name":"依頼者"},{"field_name":"案件状態"}]'
            //'filter'=>'{"item":[{"field_id": "106", "operator": "=", "value": "予備"} ]}'
        );
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

        $res = curl_exec($ch);
        echo $res;
        //$result = json_decode($res,true);
        //  echo $result->list->item;
        // セッションを終了
        curl_close($ch);


        $data=$res->list->item;

        return $data;
    }
    public function list(){

        $client = new Client();
        $res = $client->request('POST', 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi', [
            'form_params' => [
                'access_key' => 'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
                'action' => 'list_data',
                'app_id' => '@anken_test',
                'fields' => [
                    '{"field_name":"案件No"}',
                    '{"field_name":"担当者名"}',
                    '{"field_name":"学校名"}',
                    '{"field_name":"依頼者"}',
                    '{"field_name":"案件状態"}'
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
        $tasks=['task'=> $response_data];
        //echo $data;
        //   echo '<script>';
        //   echo 'console.log('.json_encode($devices).')';
        //   echo '</script>';
        return $response_data;


    }
    public function list2(){
        $url = 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi';
        $params = array('access_key'=>'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
            'action'=>'list_data','app_id'=>'@anken_test',
            'fields'=>'[{"field_name":"ID"},{"field_name":"端末種類"},{"field_name":"管理番号"},{"field_name":"自治体"},{"field_name":"状態"}]'
          //  'filter'=>'{"item":[{"field_id": "106", "operator": "=", "value": "予備"} ]}'
        );
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

        $res = curl_exec($ch);
        echo $res;
        $result = json_decode($res,true);
        //  echo $result->list->item;
        // セッションを終了
        curl_close($ch);


        $data=['records'=>$result["list"]["item"]];

        return $data;
    }
    public function show(Task $task)
    {
        return $task;
    }
    public function store(Request $request)
    {
        return Task::create($request->all());
    }
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return $task;
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return $task;
    }
    public function create()
    {
        $url = 'https://km-support.dn-cloud.com/cgi-bin/dneo/appsr.cgi';
        $params = array('access_key'=>'GN44nxnn5BY90aRCHNnkvtZuEpHHRFgXLXRGDr+pCME',
            'action'=>'list_data','app_id'=>'@tanmatu_test',
            'fields'=>'[{"field_name":"端末種類"},{"field_name":"管理番号"},{"field_name":"自治体"},{"field_name":"状態"}]',
            'filter'=>'{"item":[{"field_id": "106", "operator": "=", "value": "予備"} ]}'
        );
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

        //return view('ipad.list', $data);

        return view('task.create',$data);
    }

}

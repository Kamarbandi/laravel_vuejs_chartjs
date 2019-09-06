<?php

namespace App\Http\Controllers\Site;

use App\Events\NewEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){
        $data = [
            array('title'=>'Laravel.com', 'url'=>'https://laravel.com'),
            array('title'=>'Vue.js', 'url'=>'https://ru.vuejs.org'),
        ];
        return view('app', [
            'data'=>$data
        ]);
    }


    public function ajaxComponent(){
        return [
            array('title'=>'Laravel.com', 'url'=>'https://laravel.com'),
            array('title'=>'Vue.js', 'url'=>'https://ru.vuejs.org'),
            array('title'=>'Goshop.az', 'url'=>'https://goshop.az'),
        ];
    }


    public function chartData(){
        return [
          'labels' => ['March', 'Aprel', 'Mai', 'Juni', 'Juli', 'August'],
          'datasets' => array([
              'label' => 'Sales',
              'backgroundColor' => '#F26202',
              'data' => [15000, 5000, 10000, 30000, 20000, 15000],
          ])
        ];
    }

    public function randomData(){
        return [
            'labels' => ['March', 'Aprel', 'Mai', 'Juni', 'Juli', 'August'],
            'datasets' => array(
                [
                'label' => 'Silver',
                'backgroundColor' => '#16AB39',
                'data' => [rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000)],
                ],
                [
                    'label' => 'Gold',
                    'backgroundColor' => '#B5CC18',
                    'data' => [rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000)],
                ],
                [
                    'label' => 'Oil',
                    'backgroundColor' => '#ff0000',
                    'data' => [rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000), rand(0,400000)],
                ]
            )
        ];
    }

    public function newEvent(Request $request){


        $result = [
            'labels' => ['March', 'Aprel', 'Mai', 'Juni', 'Juli', 'August'],
            'datasets' => array([
                'label' => 'Sales',
                'backgroundColor' => '#F26202',
                'data' => [15000, 5000, 10000, 30000, 20000, 15000],
            ])
        ];

        if($result->has('label')){
            $result['labels'][] = $request->label;
            $result['datasets'][0]['data'][]= (integer)$request->sale;

            if($result->has('realtime')){
                if(filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)){
                    event(new NewEvent($result));
                }
            }
        }

        return $result;
    }
}

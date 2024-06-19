<?php
namespace App\Controllers;

use Dompdf\Dompdf;


class productosController extends BaseController{
    /*
    public function index(){
        //para enviar datos ejemplos
        $data=['titulo' => 'Hola desde data'];

        //para retornar la vista
        //return view('productosVista', $data);

        return view('plantilla/header', $data)
        .view('productosVista', $data)
        .view('plantilla/footer',['copy'=> '2024']);


        $data=[

            'header' => [
                            'nombre' => 'Eco Connection',
                            'descripcion' => 'plataforma virtual para el uso de voluntarios en campañas ....', 
                            'fechha_inicio' => '2024-04-04',
                            'fechha_final' => '2024-08-08',
                            'requisicion1' => '1',
                            'requisicion2' => '2',
                            'requisicion3' => '3'


                        ],
            'body' => [
                'graph1' => [
                                'presupuesto_proyecto' =>'1500',
                                'gasto_proyecto' =>'1200'

                            ],
                'graph2' => [
                                'categoria' => 'wifi',
                                'limite' => '500',
                                'montos' => [
                                            'fecha1' =>'2024/03/03',
                                            'requisicion' =>'250',

                                        ]  

                            ]
            ]

        ];
    }
        */



    public function index()
    {
        $data['sales'] = json_encode([
            ['date' => '2023-01-01', 'value' => 100],
            ['date' => '2023-01-02', 'value' => 200],
            ['date' => '2023-01-03', 'value' => 300],
            ['date' => '2023-01-04', 'value' => 400],
            ['date' => '2023-01-05', 'value' => 500],
            ['date' => '2023-01-06', 'value' => 600],
            ['date' => '2023-01-07', 'value' => 700]
        ]);

        echo view('productosVista', $data);
    }
/*
    public function generatePdf()
    {
        $data['sales'] = json_encode([
            ['date' => '2023-01-01', 'value' => 100],
            ['date' => '2023-01-02', 'value' => 200],
            ['date' => '2023-01-03', 'value' => 300],
            ['date' => '2023-01-04', 'value' => 400],
            ['date' => '2023-01-05', 'value' => 500],
            ['date' => '2023-01-06', 'value' => 600],
            ['date' => '2023-01-07', 'value' => 700]
        ]);


    }
        */
}


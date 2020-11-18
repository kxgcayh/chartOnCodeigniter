<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChartController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelReport');
    }

    public function chartJs()
    {
        $data['reports'] = $this->ModelReport->getAllData();
        $this->load->view('layouts/header');
        $this->load->view('contents/charts/chartjs', $data);
        $this->load->view('layouts/footer');
    }

    public function highCharts()
    {
        // Data Year
        $getYearOnly = $this->ModelReport->getDataYear();
        $data['years'] = json_encode(array_column($getYearOnly, 'year'));
        // Data Month
        $getMonthOnly = $this->ModelReport->getDataMonth();
        $data['months'] = json_encode(array_column($getMonthOnly, 'month'));
        // Data Day
        $getDayOnly = $this->ModelReport->getDataDaily();
        $data['days'] = json_encode(array_column($getDayOnly, 'day'));
        // Data Hour
        $getHourOnly = $this->ModelReport->getDataHourly();
        $data['hours'] = json_encode(array_column($getHourOnly, 'hour'));
        // Data Score
        $getScores = $this->ModelReport->getDataScore();
        $data['scores'] = json_encode(array_column($getScores, 'count'), JSON_NUMERIC_CHECK); // JSON_NUMERIC_CHECK used for remove tick from an Array

        $this->load->view('layouts/header');
        $this->load->view('contents/charts/highcharts', $data);
        $this->load->view('layouts/footer');
    }

    public function getData()
    {
        // Data Year
        $getYearOnly = $this->ModelReport->getDataYear();
        $years = json_encode(array_column($getYearOnly, 'year'), JSON_NUMERIC_CHECK);
        // Data Month
        $getMonthOnly = $this->ModelReport->getDataMonth();
        // $months = json_encode(array_column($getMonthOnly, 'month'));
        $months = array_column($getMonthOnly, 'month');
        // Data Day
        $getDayOnly = $this->ModelReport->getDataDaily();
        $days = json_encode(array_column($getDayOnly, 'day'));
        // Data Hour
        $getHourOnly = $this->ModelReport->getDataHourly();
        $hours = json_encode(array_column($getHourOnly, 'hour'));
        // Data Score
        $getScores = $this->ModelReport->getDataScore();
        // $scores = json_encode(array_column($getScores, 'count'), JSON_NUMERIC_CHECK);
        $scores = array_column($getScores, 'count');
        // Get Filter
        $type = $this->input->get('filter');
        $data = [[
            'name' => 'Score',
            'data' => $scores
        ]];
        if ($type == 'year') {
            $categories = $years;
            $result = [
                'status' => true,
                'data' => $data,
                'categories' => $categories
            ];
            echo json_encode($result);
        } elseif ($type == 'month') {
            $categories = $months;
            $result = [
                'status' => true,
                'data' => $data,
                'categories' => $categories
            ];
            echo json_encode($result);
        } elseif ($type == 'day') {
            $categories = $days;
            $result = [
                'status' => true,
                'data' => $data,
                'categories' => $categories
            ];
            echo json_encode($result);
        } else {
            $categories = $hours;
            $result = [
                'status' => true,
                'data' => $data,
                'categories' => $categories
            ];
            echo json_encode($result);
        }
    }
}

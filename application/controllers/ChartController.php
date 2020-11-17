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
        // Data Month
        $getMonthOnly = $this->ModelReport->getDataMonth();
        // Data Day
        $getDayOnly = $this->ModelReport->getDataDaily();
        // Data Score
        $getScores = $this->ModelReport->getDataScore();
        $data['days'] = json_encode(array_column($getDayOnly, 'day'));
        $data['months'] = json_encode(array_column($getMonthOnly, 'month'));
        $data['scores'] = json_encode(array_column($getScores, 'count'), JSON_NUMERIC_CHECK); // JSON_NUMERIC_CHECK used for remove tick from an Array

        $this->load->view('layouts/header');
        $this->load->view('contents/charts/highcharts', $data);
        $this->load->view('layouts/footer');
    }
}

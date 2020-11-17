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
        // Monthly Chart
        $getMonthOnly = $this->ModelReport->getDataMonth();
        $monthlyScores = $this->ModelReport->getMonthlyScore();
        $data['months'] = json_encode(array_column($getMonthOnly, 'month'));
        $data['scores'] = json_encode(array_column($monthlyScores, 'count'), JSON_NUMERIC_CHECK);

        // Daily Chart
        // $getDayOnly = $this->ModelReport->getDataDaily();

        $this->load->view('layouts/header');
        $this->load->view('contents/charts/highcharts', $data);
        $this->load->view('layouts/footer');
    }
}

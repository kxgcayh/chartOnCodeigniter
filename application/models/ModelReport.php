<?php
class ModelReport extends CI_Model
{
    public function getAllData()
    {
        $query = $this->db->query("SELECT * from tbl_report");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
            return $result;
        }
    }

    public function getDataMonth()
    {
        // $query = $this->db->query('SELECT EXTRACT(MONTH FROM created_at) as month FROM tbl_data ORDER BY(created_at)');
        $query = $this->db->query('SELECT MONTHNAME(created_at) as month FROM tbl_data');
        foreach ($query->result() as $data) {
            $result[] = $data;
        }
        return $result;
    }

    // Get Score Summary per Month
    public function getMonthlyScore()
    {
        $query = $this->db->query('SELECT SUM(score) as count FROM tbl_data GROUP BY DAY(created_at) ORDER BY created_at');
        foreach ($query->result() as $data) {
            $result[] = $data;
        }
        return $result;
    }
}

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

    public function getDataYear()
    {
        $query = $this->db->query('SELECT YEAR(created_at) as year FROM tbl_score ORDER BY created_at');
        foreach ($query->result() as $data) {
            $result[] = $data;
        }
        return $result;
    }

    public function getDataMonth()
    {
        $query = $this->db->query('SELECT MONTHNAME(created_at) as month FROM tbl_score GROUP BY MONTH(created_at) ORDER BY created_at');
        foreach ($query->result() as $data) {
            $result[] = $data;
        }
        return $result;
    }

    public function getDataDaily()
    {
        $query = $this->db->query('SELECT DAYNAME(created_at) as day FROM tbl_score ORDER BY created_at');
        foreach ($query->result() as $data) {
            $result[] = $data;
        }
        return $result;
    }

    public function getDataHourly()
    {
        $query = $this->db->query('SELECT HOUR(created_at) as hour FROM tbl_score ORDER BY created_at');
        foreach ($query->result() as $data) {
            $result[] = $data;
        }
        return $result;
    }

    public function getDataScore()
    {
        $result = [];
        $query = $this->db->query('SELECT SUM(score) as count FROM tbl_score GROUP BY MONTH(created_at) ORDER BY created_at')->result();
        foreach ($query as $row) {
            array_push($result, (int)$row->count);
        }
        return $result;
    }
}

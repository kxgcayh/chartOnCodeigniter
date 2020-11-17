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
        $query = $this->db->query('SELECT MONTHNAME(created_at) as month FROM tbl_score ORDER BY created_at');
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

    // Get Score Summary per Month
    public function getDataScore()
    {
        $query = $this->db->query('SELECT SUM(score) as count FROM tbl_score GROUP BY DAY(created_at) ORDER BY created_at');
        foreach ($query->result() as $data) {
            $result[] = $data;
        }
        return $result;
    }
}

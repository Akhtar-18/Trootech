<?php
class Api_model extends CI_Model
{

    public function fetchall($table, $select = '')
    {
        if (isset($select) && !empty($select)) {
            $this->db->select($select);
        }
        //$this->db->order_by("created_at", "DESC");
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function insertdata($table, $data)
    {

        $a = $this->db->insert($table, $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchdata($table, $id, $select = '')
    {
        if (isset($select) && !empty($select)) {
            $this->db->select($select);
        }
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->row();
        //return $query->result_array();
    }

    public function updatedata($table, $data, $id)
    {

        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    public function deletedata($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getcategory()
    {

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('pid', 0);

        $parent = $this->db->get();

        $category = $parent->result();
        $i = 0;
        foreach ($category as $main_cat) {

            $category[$i]->sub = $this->sub_category($main_cat->id);
            $i++;
        }
        return $category;
    }

    public function sub_category($id)
    {

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $id);

        $child = $this->db->get();
        $category = $child->result();
        $i = 0;
        foreach ($category as $sub_cat) {

            $category[$i]->sub = $this->sub_category($sub_cat->id);
            $i++;
        }
        return $category;
    }
}

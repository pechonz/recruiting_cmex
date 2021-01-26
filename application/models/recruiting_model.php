<?php
class recruiting_model extends CI_Model {
    //=======Add data========//
    public function create()
    {

        if ($this->input->post('exam_an_date') !='') {
            $exam_an_date = date( 'Y-m-d', strtotime( $this->input->post('exam_an_date')));
        }
        else {
            $exam_an_date = 'NULL';
        }

        if ($this->input->post('interview_an_date') !='') {
            $interview_an_date = date( 'Y-m-d', strtotime( $this->input->post('interview_an_date')));
        }
        else {
            $interview_an_date = 'NULL';
        }

        $sess_id = $this->session->userdata('username');
        $data = array(
            'recruiting_id'=> $this->input->post('recruiting_id'),
            'position_id' => $this->input->post('position_id'),
            'ward_id' => $this->input->post('ward_id'),
            'applicant_type' => $this->input->post('applicant_type'),
            'position_cnt'=> $this->input->post('position_cnt'),
            'wage' => $this->input->post('wage'),
            'exam' => $this->input->post('exam'),
            'exam_date' => date( 'Y-m-d', strtotime( $this->input->post('exam_date'))),
            'exam_announcement_date' => $exam_an_date,
            'interview_date' => date( 'Y-m-d', strtotime( $this->input->post('interview_date'))),
            'interview_announcement_date' => $interview_an_date,
            'status' => 'คัดเลือกบุคลากร',
            'insuserid' => $sess_id,
            'interview' => $this->input->post('interview')
        );

        $query=$this->db->insert('tb_recruiting',$data);
        if ($query){
            
        }
        else{
            echo "Not Added";
        }
    }

    public function update()
    {
        $id =$this->input->post('recruiting_id');
        $sess_id = $this->session->userdata('username');
        $data = array(
            'position_id' => $this->input->post('position_id'),
            'ward_id' => $this->input->post('ward_id'),
            'applicant_type' => $this->input->post('applicant_type'),
            'position_cnt'=> $this->input->post('position_cnt'),
            'wage' => $this->input->post('wage'),
            'exam' => $this->input->post('exam'),
            'exam_date' => date( 'Y-m-d', strtotime( $this->input->post('exam_date'))),
            'exam_announcement_date' => date( 'Y-m-d', strtotime( $this->input->post('exam_an_date'))),
            'interview' => $this->input->post('interview'),
            'interview_date' => date( 'Y-m-d', strtotime( $this->input->post('interview_date'))),
            'interview_announcement_date' => date( 'Y-m-d', strtotime( $this->input->post('interview_an_date'))),
            'status' => 'คัดเลือกบุคลากร',
            'upddate' => date('Y-m-d H:i:s'),
            'upduserid' => $sess_id,
        );

        $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
        $query=$this->db->update('tb_recruiting',$data);
        
        
        if ($query){
            
        }
        else{
            echo "Not Updated";
        }
    }

    //=======Get data========//
    public function showdata()
    {
        $this->db->select('a.recruiting_id, b.position_name, c.ward_name,a.applicant_type,a.position_cnt,a.wage,a.exam,a.exam_date,a.exam_announcement_date,a.interview,a.interview_date,a.interview_announcement_date,a.status,a.views,a.insuserid,a.upduserid,a.insdate,a.upddate');
        $this->db->from('tb_recruiting as a,tb_position as b, tb_location1 as c');
        $this->db->where('a.position_id = b.position_code and a.ward_id=ward_code');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPosition()
    {
        $this->db->select('a.position_code,a.position_name');
        $this->db->from('tb_position as a');
        $this->db->where('a.position_name is not null');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLocation()
    {
        $this->db->select('a.ward_code,a.ward_name');
        $this->db->from('tb_location1 as a');
        $this->db->where('a.ward_name is not null');
        $query = $this->db->get();
        return $query->result();
    }

    public function read($recruiting_id)
    {
        $this->db->select('*');
        $this->db->from('tb_recruiting as a');
        $this->db->where('a.recruiting_id',$recruiting_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $data = $query->row();
            return $data;
        }
        else {
            return FALSE;
        }
        return $query->result();
    }

}
<?php
class recruiting_model extends CI_Model {

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
            'insuserid' => '620025',
            'interview' => $this->input->post('interview')
        );

        $query=$this->db->insert('tb_recruiting',$data);
        if ($query){
            echo 'Added';
        }
        else{
            echo "Not Added";
        }
    }

}
<?php
class recruiting_model extends CI_Model {
    //=======Add data========//
    public function createModel()
    {

        $sess_id = $this->session->userdata('username');
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
        
        $array = array(
            'document_id' => "01",
            'recruiting_id' => $this->input->post('recruiting_id')
        );
        $this->db->select('*');
        $this->db->from('tb_document');
        $this->db->where($array);
        $query = $this->db->get();
        //================================================================================================
        if ($query->num_rows() > 0 && !empty($_FILES['pdf_file1']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "01";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file1'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'upduserid' => $sess_id,
                    'upddate' => date('Y-m-d H:i:s'),
                );
                $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
                $this->db->where('document_id','01');
                $query=$this->db->update('tb_document',$data);
            }
        }
        else if (!empty($_FILES['pdf_file1']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "01";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file1'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'recruiting_id'=> $this->input->post('recruiting_id'),
                    'document_id'=> "01",
                    'document_name'=> $this->input->post('recruiting_id') . "_" . "01" .".pdf",
                    'insuserid' => $sess_id,
                );
                $query=$this->db->insert('tb_document',$data);
            }
        }
        else {

        }
        
        $data = array(
            'recruiting_id'=> $this->input->post('recruiting_id'),
            'position_id' => $this->input->post('position_id'),
            'ward_id' => $this->input->post('ward_id'),
            'applicant_type' => $this->input->post('applicant_type'),
            'position_cnt'=> $this->input->post('position_cnt'),
            'wage' => $this->input->post('wage'),
            'closing_date' => $this->input->post('closing_date'),
            'exam' => $this->input->post('exam'),
            'exam_date' => date( 'Y-m-d', strtotime( $this->input->post('exam_date'))),
            'exam_announcement_date' => $exam_an_date,
            'interview_date' => date( 'Y-m-d', strtotime( $this->input->post('interview_date'))),
            'interview_announcement_date' => $interview_an_date,
            'status' => 'ประกาศรับสมัคร',
            'insuserid' => $sess_id,
            'interview' => $this->input->post('interview')
        );

        $query=$this->db->insert('tb_recruiting',$data);

    }

    public function updateModel()
    {
        $id =$this->input->post('recruiting_id');
        $sess_id = $this->session->userdata('username');

        if ($this->input->post('exam_date') !='') {
            $exam_date = date( 'Y-m-d', strtotime( $this->input->post('exam_date')));
        }
        else {
            $exam_date = 'NULL';
        }

        if ($this->input->post('interview_date') !='') {
            $interview_date = date( 'Y-m-d', strtotime( $this->input->post('interview_date')));
        }
        else {
            $interview_date = 'NULL';
        }

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
            'position_id' => $this->input->post('position_id'),
            'ward_id' => $this->input->post('ward_id'),
            'applicant_type' => $this->input->post('applicant_type'),
            'position_cnt'=> $this->input->post('position_cnt'),
            'wage' => $this->input->post('wage'),
            'closing_date' => $this->input->post('closing_date'),
            'exam' => $this->input->post('exam'),
            'exam_date' => $exam_date,
            'exam_announcement_date' => $exam_an_date,
            'interview' => $this->input->post('interview'),
            'interview_date' => $interview_date,
            'interview_announcement_date' => $interview_an_date,
            'status' => $this->input->post('status'),
            'upddate' => date('Y-m-d H:i:s'),
            'upduserid' => $sess_id,
        );

        $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
        $query=$this->db->update('tb_recruiting',$data);

        $array = array(
            'document_id' => "01",
            'recruiting_id' => $this->input->post('recruiting_id')
        );
        $this->db->select('*');
        $this->db->from('tb_document');
        $this->db->where($array);
        $query = $this->db->get();
        //================================================================================================
        if ($query->num_rows() > 0 && !empty($_FILES['pdf_file1']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "01";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file1'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'upduserid' => $sess_id,
                    'upddate' => date('Y-m-d H:i:s'),
                );
                $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
                $this->db->where('document_id','01');
                $query=$this->db->update('tb_document',$data);
            }
        }
        else if (!empty($_FILES['pdf_file1']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "01";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file1'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'recruiting_id'=> $this->input->post('recruiting_id'),
                    'document_id'=> "01",
                    'document_name'=> $this->input->post('recruiting_id') . "_" . "01" .".pdf",
                    'insuserid' => $sess_id,
                );
                $query=$this->db->insert('tb_document',$data);
            }
        }
        else {

        }
        
        //================================================================================================
        $array = array(
            'document_id' => "02",
            'recruiting_id' => $this->input->post('recruiting_id')
        );
        $this->db->select('*');
        $this->db->from('tb_document');
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0 && !empty($_FILES['pdf_file2']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "02";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file2'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'upduserid' => $sess_id,
                    'upddate' => date('Y-m-d H:i:s'),
                );
                $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
                $this->db->where('document_id','02');
                $query=$this->db->update('tb_document',$data);
            }
        }
        else if (!empty($_FILES['pdf_file2']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "02";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file2'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'recruiting_id'=> $this->input->post('recruiting_id'),
                    'document_id'=> "02",
                    'document_name'=> $this->input->post('recruiting_id') . "_" . "02".".pdf",
                    'insuserid' => $sess_id,
                );
                $query=$this->db->insert('tb_document',$data);
            }
        }
        else {

        }

        //================================================================================================
        $array = array(
            'document_id' => "03",
            'recruiting_id' => $this->input->post('recruiting_id')
        );
        $this->db->select('*');
        $this->db->from('tb_document');
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0 && !empty($_FILES['pdf_file3']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "03";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file3'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'upduserid' => $sess_id,
                    'upddate' => date('Y-m-d H:i:s'),
                );
                $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
                $this->db->where('document_id','03');
                $query=$this->db->update('tb_document',$data);
            }
        }
        else if (!empty($_FILES['pdf_file3']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "03";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file3'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'recruiting_id'=> $this->input->post('recruiting_id'),
                    'document_id'=> "02",
                    'document_name'=> $this->input->post('recruiting_id') . "_" . "03".".pdf",
                    'insuserid' => $sess_id,
                );
                $query=$this->db->insert('tb_document',$data);
            }
        }
        else {

        }

        //================================================================================================
        $array = array(
            'document_id' => "04",
            'recruiting_id' => $this->input->post('recruiting_id')
        );
        $this->db->select('*');
        $this->db->from('tb_document');
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0 && !empty($_FILES['pdf_file4']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "04";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file4'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'upduserid' => $sess_id,
                    'upddate' => date('Y-m-d H:i:s'),
                );
                $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
                $this->db->where('document_id','04');
                $query=$this->db->update('tb_document',$data);
            }
        }
        else if (!empty($_FILES['pdf_file4']['name'])){
            $sess_id = $this->session->userdata('username');
            $filename = $this->input->post('recruiting_id');
            $userid = $this->session->userdata('username');
            $config['upload_path']          = './uploads/';
            $config['file_name']            = $filename . "_" . "04";
            $config['allowed_types']        = 'pdf';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('pdf_file4'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $this->upload->overwrite = true;
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $data = array(
                    'recruiting_id'=> $this->input->post('recruiting_id'),
                    'document_id'=> "04",
                    'document_name'=> $this->input->post('recruiting_id') . "_" . "04".".pdf",
                    'insuserid' => $sess_id,
                );
                $query=$this->db->insert('tb_document',$data);
            }
        }
        else {

        }
    }

    public function deleteModel()
    {
        $id =$this->input->post('recruiting_id');
        $sess_id = $this->session->userdata('username');

        $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
        $query=$this->db->delete('tb_recruiting');

        $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
        $query=$this->db->delete('tb_document');
    }

    //=======Get data========//
    public function showDataModel()
    {
        $this->db->select('a.recruiting_id, b.position_name, c.ward_name,a.applicant_type,a.position_cnt,a.wage,a.closing_date,a.exam,a.exam_date,a.exam_announcement_date,a.interview,a.interview_date,a.interview_announcement_date,a.status,a.views,a.insuserid,a.upduserid,a.insdate,a.upddate');
        $this->db->from('tb_recruiting as a,tb_position as b, tb_location1 as c');
        $this->db->where('a.position_id = b.position_code and a.ward_id=ward_code and a.status NOT LIKE "สิ้นสุดการคัดเลือก"');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPositionModel()
    {
        $this->db->select('a.position_code,a.position_name');
        $this->db->from('tb_position as a');
        $this->db->where('a.position_name is not null');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLocationModel()
    {
        $this->db->select('a.ward_code,a.ward_name');
        $this->db->from('tb_location1 as a');
        $this->db->where('a.ward_name is not null');
        $query = $this->db->get();
        return $query->result();
    }

    public function readModel($recruiting_id)
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

    public function detailsModel($recruiting_id)
    {
        $id =$recruiting_id;
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('recruiting_id',$this->input->post('recruiting_id'));
        $this->db->update('tb_recruiting');

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

    public function documentModel($recruiting_id)
    {
        $id =$recruiting_id;
        $this->db->select('a.document_id,a.document_name');
        $this->db->from('tb_document as a');
        $this->db->where('a.recruiting_id',$id);
        $query = $this->db->get();
        return $query->result();
    }
}
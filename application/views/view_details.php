<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script language="javascript" type="text/javascript">

    function disableExam() {
       $("input.exam").attr("disabled", true);
   }

   function undisableExam() {
       $("input.exam").attr("disabled", false);
   }

   function disableInterview() {
       $("input.interview").attr("disabled", true);
   }

   function undisableInterview() {
       $("input.interview").attr("disabled", false);
   }

   document.addEventListener("DOMContentLoaded", function(event) { 
      $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }); 
      $('.examChk').on('change', function(){
         this.value = this.checked ? 1 : 0;
         if (this.value == 1){
           undisableExam()
       }
       else{
           disableExam()
       }
   }).change();

      $('.interviewChk').on('change', function(){
         this.value = this.checked ? 1 : 0;
         if (this.value == 1){
           undisableInterview()
       }
       else{
           disableInterview()
       }
   }).change();


  });
</script>

<div class="container py-5">
    <form class="form">
      <div class="card">
        <div class="card-header" style="font-weight: bold">รายละเอียด</div>
        <div class="card-body">
          <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label for="exampleAccount" style="font-weight: bold;">ตำแหน่ง</label>
            <div>
              <?php foreach ($query as $rs) { ?>
                  <?php if ($query3->position_id == $rs->position_code): ?>
                      <p><?php echo $rs->position_name;?></p>
                  <?php endif; ?>  
              <?php } ?>
            </div>
          </div>
          <div class="col-md-3">
              <label for="exampleCtrl" style="font-weight: bold;">หน่วยงาน</label>
              <div>
                  <?php foreach ($query2 as $rs2) { ?>
                      <?php if ($query3->ward_id == $rs2->ward_code): ?>
                        <p><?php echo $rs2->ward_name;?></p>
                      <?php endif; ?>                                    
                  <?php } ?>
              </div>
          </div>
          <div class="col-md-3"></div>
        </div>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label for="exampleAmount" style="font-weight: bold;">ประเภท</label>
            <div>
               <p><?php echo $query3->applicant_type;?></p>
            </div>
          </div>
          <div class="col-md-3">
              <label for="exampleAmount" style="font-weight: bold;">เงินเดือน</label>
              <p><?php echo $query3->wage;?></p>
          </div>
          <div class="col-md-3"></div>
        </div>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label for="exampleFirst" style="font-weight: bold;">ตำแหน่งว่าง</label>
            <p><?php echo $query3->position_cnt;?></p>
          </div>
          <div class="col-md-3">
            <label class="form-check-label" style="font-weight: bold;">สิ้นสุดรับสมัคร</label>
            <p><?php echo $query3->closing_date;?></p>
          </div>
          <div class="col-md-3"></div>
        </div>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label class="form-check-label" style="font-weight: bold;">สอบข้อเขียน</label>
            <p><?php echo $query3->exam_date;?></p>
          </div>
          <div class="col-md-3">
              <label class="form-check-label" style="font-weight: bold;">สอบสัมภาษณ์</label>
              <p><?php echo $query3->interview_date;?></p>
          </div>
          <div class="col-md-3"></div>
        </div>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <?php foreach ($query4 as $rs) { ?>
            <?php if ($rs->document_id == '01'): ?>
                <a class="btn btn-secondary" href="<?php echo base_url() ?>./uploads/<?php echo $rs->document_name;?>"><i class="fa fa-fw fa-file-pdf"></i>ประกาศรับสมัคร</a><br><br>

            <?php elseif ($rs->document_id == '02'): ?>
                <a class="btn btn-secondary" href="<?php echo base_url() ?>./uploads/<?php echo $rs->document_name;?>"><i class="fa fa-fw fa-file-pdf"></i>ประกาศรายชื่อผู้มีสิทธิ์สอบ</a><br><br>

            <?php elseif ($rs->document_id == '03'): ?>
                <a class="btn btn-secondary" href="<?php echo base_url() ?>./uploads/<?php echo $rs->document_name;?>"><i class="fa fa-fw fa-file-pdf"></i>ประกาศรายชื่อผู้มีสิทธิ์สอบ</a><br><br>

            <?php else: ?>
                <a class="btn btn-secondary" href="<?php echo base_url() ?>./uploads/<?php echo $rs->document_name;?>"><i class="fa fa-fw fa-file-pdf"></i>ประกาศผลการคัดเลือก</a><br><br>
                
            <?php endif; ?>  
        <?php } ?>
          </div>
          <div class="col-md-6"></div>
        </div>
        </div>
      </div>
    </form>
</div>
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

   function examCheckbox() {
       var chkExam = <?php echo $query3->exam;?>;
        if (chkExam != 0){
          $("#exam_check").prop("checked", true);
        }
        else {
          $("#exam_check").prop("checked", false);
        }
   }

   function interviewCheckbox() {
      var chkInterview = <?php echo $query3->exam;?>;
      if (chkInterview != 0){
        $("#interview_check").prop("checked", true);
      }
      else {
        $("#interviewcheck").prop("checked", false);
      }
   }
   
   document.addEventListener("DOMContentLoaded", function(event) { 
      $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }); 
      interviewCheckbox()
      examCheckbox()
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
    <form action="<?php echo site_url('admin/updateData');?>" method="post" class="form">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10 offset-md-1">                    
                        <!-- form complex example -->
                        <div class="form-row mt-4">
                            <div class="col-sm-4 pb-3">
                                <label style="font-weight: bold;">ตำแหน่ง</label>
                                <div>
                                    <select class="custom-select" name="position_id">
                                        <?php foreach ($query as $rs) { ?>
                                            <?php if ($query3->position_id == $rs->position_code): ?>
                                                <option selected value=<?php echo $rs->position_code;?>><?php echo $rs->position_name;?></option>
                                            <?php else: ?>
                                                <option value=<?php echo $rs->position_code;?>><?php echo $rs->position_name;?></option>
                                            <?php endif; ?>  
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 pb-3">
                                <label style="font-weight: bold;">หน่วยงาน</label>
                                <div>
                                    <select class="custom-select" name="ward_id">
                                        <?php foreach ($query2 as $rs2) { ?>

                                            <?php if ($query3->ward_id == $rs->ward_code): ?>

                                                    <option selected value=<?php echo $rs2->ward_code;?>><?php echo $rs2->ward_name;?></option>

                                            <?php else: ?>

                                                    <option value=<?php echo $rs2->ward_code;?>><?php echo $rs2->ward_name;?></option>

                                            <?php endif; ?>                                    

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 pb-3">
                                <label style="font-weight: bold;">ประเภท</label>
                                <div>
                                    <select class="custom-select" name="applicant_type">
                                        <option value="พนักงานประจำ">พนักงานประจำ</option>
                                        <option value="พนักงานชั่วคราว">พนักงานชั่วคราว</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 pb-3">
                                <label style="font-weight: bold;">เงินเดือน</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                    <input type="text" class="form-control" name="wage" value="<?php echo $query3->wage;?>">
                                </div>
                            </div>
                            <div class="col-sm-3 pb-3">
                                <label style="font-weight: bold;" for="exampleFirst">ตำแหน่งว่าง</label>
                                <input type="text" class="form-control" name="position_cnt" value="<?php echo $query3->position_cnt;?>">
                            </div>
                            <div class="col-sm-3 pb-3">
                                <label style="font-weight: bold;">วันที่สิ้นสุดรับสมัคร</label>
                                <input type="text" class="form-control datepicker" name="closing_date" value="<?php echo $query3->closing_date;?>">
                            </div>
                            <div class="col-sm-6 pb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input examChk" name="exam" id="exam_check">
                                    <label style="font-weight: bold;" class="form-check-label">สอบข้อเขียน</label>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label style="font-weight: bold;">วันที่สอบข้อเขียน</label>
                                        <?php if ($query3->exam_date != 0000-00-00): ?>
                                            <input type="text" class="form-control datepicker exam" name="exam_date" value="<?php echo $query3->exam_date;?>">
                                        <?php else: ?>
                                            <input type="text" class="form-control datepicker exam" name="exam_date" value="">
                                        <?php endif; ?>  
                                    </div>
                                    <div class="col">
                                        <label style="font-weight: bold;">วันที่ประกาศผล</label>
                                        <?php if ($query3->exam_announcement_date != 0000-00-00): ?>
                                            <input type="text" class="form-control datepicker exam" name="exam_an_date" value="<?php echo $query3->exam_announcement_date;?>"> 
                                        <?php else: ?>
                                            <input type="text" class="form-control datepicker exam" name="exam_an_date" value=""> 
                                        <?php endif; ?>  
                                        
                                    </div>
                                </div>
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input interviewChk" name="interview" id="interview_check">
                                  <label style="font-weight: bold;" class="form-check-label">สอบสัมภาษณ์</label>
                                </div>
                                <div class="form-row">
                                  <div class="col">
                                      <label style="font-weight: bold;">วันที่สอบสัมภาษณ์</label>
                                      <?php if ($query3->interview_date != 0000-00-00): ?>
                                          <input type="text" class="form-control datepicker interview" name="interview_date" value="<?php echo $query3->interview_date;?>">
                                      <?php else: ?>
                                          <input type="text" class="form-control datepicker interview" name="interview_date" value="">
                                      <?php endif; ?>
                                  </div>
                                  <div class="col">
                                      <label style="font-weight: bold;">วันที่ประกาศผล</label>
                                      <?php if ($query3->interview_announcement_date != 0000-00-00): ?>
                                          <input type="text" class="form-control datepicker interview" name="interview_an_date" value="<?php echo $query3->interview_announcement_date;?>">
                                      <?php else: ?>
                                          <input type="text" class="form-control datepicker interview" name="interview_an_date" value="">
                                      <?php endif; ?>
                                       
                                  </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-weight: bold;">ประกาศรับสมัคร</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">ประกาศรายชื่อผู้มีสิทธสอบ</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">ประกาศผลสอบ</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">ผลการคัดเลือก</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button href="<?php echo site_url('admin');?>" class="btn btn-warning">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
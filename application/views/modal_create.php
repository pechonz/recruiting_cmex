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
      disableExam() 
      disableInterview()
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

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/create');?>" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="col">
                            <label style="font-weight: bold;">ตำแหน่งเลขที่</label>
                            <input type="text" class="form-control" name="recruiting_id" required>
                        </div>

                        <div class="col">
                            <label style="font-weight: bold;">ตำแหน่ง</label>
                            <div>
                                <select class="custom-select" name="position_id">
                                    <option selected>โปรดเลือก</option>
                                    <?php foreach ($query as $rs) { ?>
                                        <option value=<?php echo $rs->position_id;?>><?php echo $rs->position_name;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="col">
                            <label style="font-weight: bold;">หน่วยงาน</label>
                            <div>
                                <select class="custom-select" name="ward_id">
                                    <option selected>โปรดเลือก</option>
                                    <?php foreach ($query2 as $rs2) { ?>
                                        <option value=<?php echo $rs2->ward_code;?>><?php echo $rs2->ward_name;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <label style="font-weight: bold;">ประเภท</label>
                            <div>
                                <select class="custom-select" name="applicant_type">
                                    <option selected>โปรดเลือก</option>
                                    <option value="พนักงานประจำ">พนักงานประจำ</option>
                                    <option value="พนักงานชั่วคราว">พนักงานชั่วคราว</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="col">
                            <label style="font-weight: bold;">เงินเดือน</label>
                            <input type="text" class="form-control" name="wage">
                        </div>
                        <div class="col">
                            <label style="font-weight: bold;">สิ้นสุดรับสมัคร</label>
                            <input type="text" class="form-control datepicker" name="closing_date">
                        </div>
                    </div>

                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="col">
                            <label style="font-weight: bold;">ตำแหน่งว่าง</label>
                            <input type="text" class="form-control" name="position_cnt">
                        </div>
                    </div>

                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input examChk" name="exam">
                            <label style="font-weight: bold;" class="form-check-label">สอบข้อเขียน</label>
                        </div>
                    </div>
                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="col">
                            <label style="font-weight: bold;">วันที่สอบข้อเขียน</label>
                            <input type="text" class="form-control datepicker exam" name="exam_date">
                        </div>
                        <div class="col">
                            <label style="font-weight: bold;">วันที่ประกาศผล</label>
                            <input type="text" class="form-control datepicker exam" name="exam_an_date"> 
                        </div>
                    </div>

                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input interviewChk" name="interview">
                            <label style="font-weight: bold;" class="form-check-label">สอบสัมภาษณ์</label>
                        </div>
                    </div>
                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="col">
                            <label style="font-weight: bold;">วันที่สอบสัมภาษณ์</label>
                            <input type="text" class="form-control datepicker interview" name="interview_date">
                        </div>
                        <div class="col">
                            <label style="font-weight: bold;">วันที่ประกาศผล</label>
                            <input type="text" class="form-control datepicker interview" name="interview_an_date">
                        </div>
                    </div>

                    <div class="form-row" style="padding-bottom: 10px">
                        <div class="col">
                            <div class="form-group">
                                <label style="font-weight: bold;">ประกาศรับสมัคร</label>
                                <input type="file" class="form-control-file" name="pdf_file1">
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="padding-bottom: 10px">
                        <button type="submit" class="btn btn-success">เพิ่ม</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
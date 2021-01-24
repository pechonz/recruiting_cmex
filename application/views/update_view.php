<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Welcome</title>
</head>
<div class="container-fluid" style="padding-top: 10px">
    <form action="<?php echo site_url('admin/updateData');?>" method="post" class="form">
        <div class="form-row">
            <div class="col">
                <label>ตำแหน่ง</label>
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
        </div>

        <div class="form-row">
            <div class="col">
                <label>หน่วยงาน</label>
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
        </div>

        <div class="form-row">
            <div class="col">
                <label>ประเภท</label>
                <div>
                    <select class="custom-select" name="applicant_type">
                        <option value="พนักงานประจำ">พนักงานประจำ</option>
                        <option value="พนักงานชั่วคราว">พนักงานชั่วคราว</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="validationCustom01">เงินเดือน</label>
                <input type="text" class="form-control" name="wage" value="<?php echo $query3->wage;?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="validationCustom01">ตำแหน่งว่าง</label>
                <input type="text" class="form-control" name="position_cnt" value="<?php echo $query3->position_cnt;?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-check">
                <input type="checkbox" class="form-check-input examChk" name="exam">
                <label class="form-check-label">สอบข้อเขียน</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control datepicker exam" name="exam_date" value="<?php echo $query3->exam_date;?>">
            </div>
            <div class="col">
                <input type="text" class="form-control datepicker exam" name="exam_an_date" value="<?php echo $query3->exam_announcement_date;?>"> 
            </div>
        </div>

        <div class="form-row">
            <div class="form-check">
                <input type="checkbox" class="form-check-input interviewChk" name="interview">
                <label class="form-check-label">สอบสัมภาษณ์</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control datepicker interview" name="interview_date" value="<?php echo $query3->interview_date;?>">
            </div>
            <div class="col">
                <input type="text" class="form-control datepicker interview" name="interview_an_date" value="<?php echo $query3->interview_announcement_date;?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </div>

        <div class="form-row">
            <input type="hidden" class="form-control" name="recruiting_id" value="<?php echo $query3->recruiting_id;?>">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </form>
</div>
</html>
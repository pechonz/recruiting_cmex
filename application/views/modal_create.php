<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/create');?>" method="post" class="form">
                    <div class="form-row">
                        <div class="col">
                            <label for="validationCustom01">ตำแหน่งเลขที่</label>
                            <input type="text" class="form-control" name="recruiting_id" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label>ตำแหน่ง</label>
                            <div>
                                <select class="custom-select" name="position_id">
                                    <option selected>โปรดเลือก</option>
                                    <?php foreach ($query as $rs) { ?>
                                        <option value=<?php echo $rs->position_code;?>><?php echo $rs->position_name;?></option>
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
                                    <option selected>โปรดเลือก</option>
                                    <?php foreach ($query2 as $rs2) { ?>
                                        <option value=<?php echo $rs2->ward_code;?>><?php echo $rs2->ward_name;?></option>
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
                                    <option selected>โปรดเลือก</option>
                                    <option value="พนักงานประจำ">พนักงานประจำ</option>
                                    <option value="พนักงานชั่วคราว">พนักงานชั่วคราว</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="validationCustom01">เงินเดือน</label>
                            <input type="text" class="form-control" name="wage">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="validationCustom01">ตำแหน่งว่าง</label>
                            <input type="text" class="form-control" name="position_cnt">
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
                            <input type="text" class="form-control datepicker exam" name="exam_date">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control datepicker exam" name="exam_an_date"> 
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
                            <input type="text" class="form-control datepicker interview" name="interview_date">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control datepicker interview" name="interview_an_date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>

                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
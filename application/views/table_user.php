<script language="javascript" type="text/javascript">
   document.addEventListener("DOMContentLoaded", function(event) { 
      $('#userTable').DataTable({
        "pageLength": 10,
        "responsive": true
      });
  });
</script>

<div class="container-fluid" style="padding-top: 10px">
    <div class="table-responsive">
        <table id="userTable" class="table table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">ประกาศ</th>
              <th scope="col">รหัส</th>
              <th scope="col">ตำแหน่ง</th>
              <th scope="col">หน่วยงาน</th>
              <th scope="col">ประเภท</th>
              <th scope="col">ตำแหน่งว่าง</th>
              <th scope="col">เงินเดือน</th>
              <th scope="col">สิ้นสุดรับสมัคร</th>
              <th scope="col">สถานะ</th>
              <th scope="col">รายละเอียด</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($query as $rs) { ?>
            <tr>
                <td><?php echo $rs->insdate;?><br><p style="color: #FF0000"><?php echo $rs->views;?> Views</p></td>
                <td><?php echo $rs->recruiting_id;?></td>
                <td><?php echo $rs->position_name;?></td>
                <td><?php echo $rs->ward_name;?></td>
                <td><?php echo $rs->applicant_type;?></td>
                <td><?php echo $rs->position_cnt;?></td>
                <td><?php echo $rs->wage;?></td>
                <td><?php echo $rs->closing_date;?></td>
                <td><?php echo $rs->status;?></td>
                <td>
                    <a class="btn btn-primary" href="<?php echo site_url("user/details/".$rs->recruiting_id); ?>" value="<?php echo $rs->recruiting_id;?>"><i class="fa fa-fw fa-edit"></i></a>
                </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
</div>
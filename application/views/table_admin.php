<script language="javascript" type="text/javascript">
   document.addEventListener("DOMContentLoaded", function(event) { 
      $('#adminTable').DataTable({
        "pageLength": 10,
        "responsive": true
      });
  });
</script>

<div class="container-fluid" style="padding-top: 10px">
    <div class="table-responsive">
        <table id="adminTable" class="table table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">รหัส</th>
              <th scope="col">ตำแหน่ง</th>
              <th scope="col">หน่วยงาน</th>
              <th scope="col">ประเภท</th>
              <th scope="col">ตำแหน่งว่าง</th>
              <th scope="col">เงินเดือน</th>
              <th scope="col">สถานะ</th>
              <th scope="col">ผู้ประกาศ</th> 
              <th scope="col">ผู้อัพเดทประกาศ</th> 
              <th scope="col">ประกาศ</th>
              <th scope="col">อัพเดทประกาศ</th>
              <th scope="col">แก้ไข</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($query as $rs) { ?>
            <tr>
                <td><?php echo $rs->recruiting_id;?></td>
                <td><?php echo $rs->position_name;?></td>
                <td><?php echo $rs->ward_name;?></td>
                <td><?php echo $rs->applicant_type;?></td>
                <td><?php echo $rs->position_cnt;?></td>
                <td><?php echo $rs->wage;?></td>
                <td><?php echo $rs->status;?></td>
                <td><?php echo $rs->insuserid;?></td>
                <td><?php echo $rs->upduserid;?></td>
                <td><?php echo $rs->insdate;?></td>
                <td><?php echo $rs->upddate;?></td>
                <td>
                    <a class="btn btn-warning" href="<?php echo site_url("admin/update/".$rs->recruiting_id); ?>"><i class="fa fa-fw fa-edit"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger" href="<?php echo site_url("admin/delete/".$rs->recruiting_id); ?>"><i class="fa fa-fw fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
</div>
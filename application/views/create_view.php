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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Welcome</title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  <a class="navbar-brand" href="<?php echo site_url('home');?>">Recruiting CMEx</a>
  
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
		<a class="nav-link" href="<?php echo site_url('login');?>">
			ออกจากระบบ
		</a>
    </li>
  </ul>
</nav>

<body>
	<div class="container-fluid" style="padding-top: 10px">

		<form action="<?php echo site_url('create/create_recruiting');?>" method="post" class="form">
			<div class="form-row">
	 		    <div class="col-md-3 mb-3">
	 		      <label for="validationCustom01">ตำแหน่งเลขที่</label>
	 		      <input type="text" class="form-control" name="recruiting_id" required>
	 		    </div>
	 		  </div>

			<div class="form-row">
			    <div class="col-md-3 mb-3">
			      <label>ตำแหน่ง</label>
					<div>
			      	<select class="custom-select" name="position_id">
				    <option selected>โปรดเลือก</option>
				    <option value="01">หัวหน้าศูนย์</option>
					<option value="02">รักษาการแทน เลขานุการศูนย์</option>
					<option value="43">พนักงานธุรการ</option>
					<option value="47">พนักงานบริการทั่วไป(คนงาน)</option>
					<option value="44">ช่างเขียนแบบ</option>
					<option value="55">เภสัชกร</option>
					<option value="56">พนักงานบัญชี</option>
					<option value="57">พนักงานผู้ช่วยทางการแพทย์</option>
					<option value="58">แพทย์จีน</option>
					<option value="59">นักฟิสิกส์การแพทย์</option>
					<option value="60">ผู้จัดการ (LASIK)</option>
					<option value="61">พนักงานการเงิน</option>
					<option value="62">นักเคมีรังสี</option>
					<option value="63">นักเภสัชรังสี</option>
					<option value="64">นักรังสีการแพทย์</option>
					<option value="65">แพทย์</option>
					<option value="66">พนักงานเวชระเบียน</option>
					<option value="67">พนักงานบริหารงานทั่วไป</option>
					<option value="68">พนักงานเก็บเงิน</option>
					<option value="69">แพทย์แผนไทยประยุกต์</option>
					<option value="70">ช่างไฟฟ้า</option>
					<option value="71">พนักงานเปล</option>
					<option value="72">พนักงานผู้ช่วยเภสัชกร</option>
					<option value="73">นักเทคนิคการแพทย์</option>
					<option value="74">นักกายภาพบำบัด</option>
					<option value="75">พนักงานขับรถยนต์</option>
					<option value="76">พนักงานผู้ช่วยทางการแพทย์</option>
					<option value="77">นักวิชาการคอมพิวเตอร์</option>
					<option value="78">นักกิจกรรมบำบัด</option>
					<option value="79">พนักงานโภชนาการ</option>
					<option value="80">นักโภชนาการ</option>
					<option value="81">พนักงานเปล</option>
					<option value="82">พนักงานเครื่องคอมพิวเตอร์</option>
					<option value="83">พนักงานประชาสัมพันธ์</option>
					<option value="84">พนักงานธุรการ (พัสดุ)</option>
					<option value="85">พนักงานกายภาพบำบัด</option>
					<option value="86">พนักงานการตลาด</option>
					<option value="87">เจ้าหน้าที่ตรวจการนอนหลับ</option>
					<option value="88">วิศวกรระบบเครือข่าย</option>
					<option value="89">พยาบาล</option>
					<option value="90">พนักงานบริหารงานทั่วไป (บุคคล)</option>
					<option value="91">เจ้าหน้าที่การเงินและบัญชี</option>
					<option value="92">พนักงานต้อนรับ</option>
					<option value="93">ผู้จัดการ (TTCM)</option>
					<option value="94">พนักงานธุรการ (กายภาพบำบัด)</option>
					<option value="95">พนักงานผู้ช่วยทางการแพทย์ (กายภาพบำบัด)</option>
					<option value="96">พนักงานโภชนาการ (กุ๊ก)</option>
					<option value="97">พนักงานโภชนาการ (ผู้ช่วยกุ๊ก)</option>
					<option value="98">ผู้อำนวยการศูนย์</option>
					<option value="99">รองผู้อำนวยการ</option>
				  </select>
			      </div>
			    </div>
			</div>

			<div class="form-row">
			    <div class="col-md-3 mb-3">
			      <label>หน่วยงาน</label>
					<div>
			      	<select class="custom-select" name="ward_id">
				    <option selected>โปรดเลือก</option>
					<option value="0000">สำนักงานศูนย์ความเป็นเลิศฯ</option>
					<option value="0101">ศูนย์เลสิค</option>
					<option value="0202">ศูนย์สุขภาพสตรี</option>
					<option value="0303">ศูนย์การแพทย์ผสมผสาน</option>
					<option value="0404">ศูนย์เพทซีที และไซโคลตรอน</option>
					<option value="0505">ศูนย์เลเซอร์ต้อกระจกเชียงใหม่</option>
					<option value="0606">ศูนย์เวชศาสตร์ผู้สูงอายุ</option>
					<option value="0707">ศูนย์วิเคราะห์สุขภาพการนอนหลับ</option>
					<option value="0808">ศูนย์ผู้ป่วยนอกCmex</option>
					<option value="0909">ศูนย์ผู้ป่วยนอกGMC</option>
					<option value="1010">ศูนย์ผู้ป่วยในGMC</option>
					<option value="1111">ห้องตรวจจักษุGMC</option>
					<option value="1212">ห้องยาCmex</option>
					<option value="1313">ห้องยา IPD GMC</option>
					<option value="1414">ห้องยา OPD GMC</option>
					<option value="1515">ห้องยา TTCM</option>
					<option value="1616">หน่วยปฏิบัติการLab CMEx</option>
					<option value="1717">ศูนย์การแพทย์เพื่อการมีบุตร</option>
				  </select>
			      </div>
			    </div>
			</div>

			<div class="form-row">
			    <div class="col-md-3 mb-3">
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
 		    <div class="col-md-3 mb-3">
 		      <label for="validationCustom01">เงินเดือน</label>
 		      <input type="text" class="form-control" name="wage">
 		    </div>
 		  </div>

   		  <div class="form-row">
 		    <div class="col-md-3 mb-3">
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
 		    <div class="col-md-2 mb-3">
 		      <input type="text" class="form-control datepicker exam" name="exam_date">
 		    </div>
 		    <div class="col-md-2 mb-3">
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
 		    <div class="col-md-2 mb-3">
 		      <input type="text" class="form-control datepicker interview" name="interview_date">
 		    </div>
 		    <div class="col-md-2 mb-3">
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

	<div class="footer text-center fixed-bottom" style="margin-bottom:0">
	  <p>2021</p>
	</div>

</body>
</html>
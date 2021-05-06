<div class="error"></div>
<div class="success"></div>
<form id="frm-mobile-verification" name="myForm" onsubmit="return validateForm()" action="/profile.php" required>
	<div class="form-row">
		<label>OTP is sent to Your Mobile Number</label>		
	</div>

	<div class="form-row">
		<input type="number"  id="mobileOtp" class="form-input" placeholder="Enter the OTP" name="otpverify">		
	</div>

	<div class="row">
		<input id="verify" type="submit" class="btnVerify" value="Verify" onClick="verifyOTP();" required>
	</div>
	
</form>
<script>
function validateForm() {
  var x = document.forms["myForm"]["otpverify"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
}
</script>
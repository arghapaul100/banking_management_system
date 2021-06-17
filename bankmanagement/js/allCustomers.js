var totalAmount, fromGmail, fromName, allGmail, allName, arr = new Array(),
timeLine = gsap.timeline();
timeLine.to('#popup',{y: 200, duration: 0.5, opacity:0});

timeLine2 = gsap.timeline();
timeLine2.from('#successPopUp',{duration: 0.5, opacity:0});

timeLine.pause();
timeLine2.pause();
$(document).ready(function(){
	$('.transfer_btn').click(function(e){
		arr = [];
		$('#toGmailText').html("");
		totalAmount = Number($(this).parent().prev().find('#rupee').text());
		fromName = $(this).parent().prev().prev().prev().text();
		fromGmail = $(this).parent().prev().prev().find('.gmail').attr('title');
		$('html,body').css('overflow','hidden');
		$('.gmail').each(function(){
			var gmail = $(this).attr('title');
			if(gmail != fromGmail){
				arr.push($(this).attr('title'));
			}
		});
		$('#totalAmount').text('Current amount : '+totalAmount);
		$('#fromGmailText').val(fromGmail);
		
		$('#toGmailText').append(`<option value="0">--choose customer--</option>`);
		for (var i = 0; i < arr.length; i++) {
			$('#toGmailText').append(`<option value="${arr[i]}">${arr[i]}</option>`);
		}
		$('#popup').show();
		$('#main').addClass('blur_main');
	});
	$('#transferAmountText').keyup(function(e){
		if($(this).val().length > 0){
			var sub = totalAmount - Number($(this).val());
			if($(this).val() < totalAmount){
				$('#totalAmount').html(`Current amount : ${totalAmount} <span style="color:rgba(0,0,0,0.5);">will be ${sub}</span>`);
			}else{
				$('#totalAmount').html(`Current amount : ${totalAmount} <span class="text-danger">will be 0</span>`);
			}
		}else{
			$('#totalAmount').text('Current amount : '+totalAmount);
		}
	})
	function closePopUp(){
		$('#popup').hide();
		$('#main').removeClass('blur_main');
		$('html,body').css('overflow','');
		$('#toGmailErr').addClass('d-none');
		$('#amountFieldErr').addClass('d-none');
		$('#transferAmountText').val("");
	}
	function validation(){
		var selectBoxVal = $('#toGmailText').val();
		var amountField = $('#transferAmountText').val();
		if(selectBoxVal == "0" && amountField.length < 1){
			$('#toGmailErr').removeClass('d-none');
			$('#amountFieldErr').removeClass('d-none');
		}else if (amountField.length < 1) {
			$('#toGmailErr').addClass('d-none');
			$('#amountFieldErr').removeClass('d-none');
		}else if (selectBoxVal == "0") {
			$('#toGmailErr').removeClass('d-none');
			$('#amountFieldErr').addClass('d-none');
		}
		else{
			$('#toGmailErr').addClass('d-none');
			$('#amountFieldErr').addClass('d-none');
			var date = new Date();
			var hour = date.getHours();
			var min = date.getMinutes();
			var sec = date.getSeconds();
			var day = date.getDate();
			var mon = date.getMonth();
			var year = date.getFullYear();

			var finalDate = `${day}/${mon+1}/${year} ${hour}:${min}:${sec}`;
			$.post('../pages/update_transection.php',{date : finalDate, gmailFrom : fromGmail, gmailTo : selectBoxVal, transferedAmount : amountField},function(data){
				timeLine.play();
				$('#successPopUp').removeClass('d-none');
				timeLine2.play();
				// console.log(data);
			});
		}
	}
	$('#cancelTransectChild').click(function(){
		closePopUp();
	})
	$('#finalTransferButton').click(function(){
		validation();
	})
	$('#successPopupCloseButton').click(function(){
		location.reload();
	})

})
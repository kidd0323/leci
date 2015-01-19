$(document).ready(function(){
	
	var donation_news_lower = 0;
	var donation_news_upper = 6;
	var donation_news_size = 0;
	var donation_per_page = 6;

	$('#donation_news_div .row-fluid:not(:lt('+donation_per_page+'))').css("display", "none");
	setInterval(roll_latest_donation, 5000);
	setInterval(update_sum_info, 60000);
	
	function update_sum_info(){
		$.getJSON("index.php/project/get_sum_info", function(data){
			$("#sum_money").html(data.sum_info.money);
			$("#sum_people").html(data.sum_info.people);			
		});
	}
	
	function roll_latest_donation(){
		
		donation_news_size = $("#donation_news_div div[class=row-fluid]").length;
		
		donation_news_lower += donation_per_page;
		donation_news_upper += donation_per_page;
		if(donation_news_lower >= donation_news_size){
			donation_news_lower = 0;
			donation_news_upper = donation_per_page;
		}
		if(donation_news_upper > donation_news_size){
			donation_news_upper = donation_news_size;
		}

		$("#donation_news_div div[class=row-fluid]").css("display", "none");

		$('#donation_news_div div[class=row-fluid]:lt('+donation_news_upper+'):not(:lt('+donation_news_lower+'))').css("display","block");

	}
	
});
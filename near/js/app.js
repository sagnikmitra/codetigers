"use strict";

$(document).ready(function() {
	$('.modal-trigger').leanModal();
});

var vm = {
    searchResults: ko.observableArray()
};
ko.applyBindings(vm);

function getLocation() {
    if (navigator.geolocation) {
        vm.searchResults.removeAll();
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    /* W3 Schools Map Assist */
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    var latlon = new google.maps.LatLng(lat, lon)
    var mapholder = document.getElementById('mapholder')
    mapholder.style.height = '250px';
    mapholder.style.width = '500px';

    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    
    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
    /* End W3 Schools Map Assist */
    
	//Fetch restaurants nearby
    $.ajax({
        url: '/find',
        dataType: "json",
        data: {
            "latitude": position.coords.latitude,
            "longitude": position.coords.longitude
        },
        type: 'GET',
        success: function(data) {
			//For each restaurant that was fetched, add to page via knockout array.push, and then check to see if we have any reviews stored in mongoDB
            data.businesses.forEach(function(business) {
				//console.log(data)
				business.newID = business.id + "123";
				business.newIDlink = "#" + business.newID;
                vm.searchResults.push(business);
				console.log(business)
				var restaurant = business.name;
				$.ajax({
					url: '/review',
					dataType: "json",
					data: {
						"restaurant": restaurant
					},
					type: 'GET',
					success: function(result) {
						var index = 0;
						//At this point, result=all the reviews for the current business
						while (result[index].restaurant) {
							$("div." + result[index].restaurantID + " .collection").append($("<li>").addClass("collection-item avatar " + index));
							$("div." + result[index].restaurantID + " .collection-item ." + index).append($("<i>supervisor_account</i>").addClass("material-icons circle light-blue lighten-1"));
							$("div." + result[index].restaurantID + " .collection-item ." + index).append($("<span>").addClass("title").text("Username - " + result[index].date));
							$("div." + result[index].restaurantID + " .collection-item ." + index).append($("<p>").text(result[index].written));
							$("div." + result[index].restaurantID + " .collection-item ." + index).append($("<a>").addClass("secondary-content"));
							for(var i = 0; i < result[index].rating; i++) {
								$("." + result[index].restaurantID + " .collection-item ." + index + " .secondary-content").append($("<i>grade</i>").addClass("material-icons"));
							}
							index++;
						}
					},
					error: function(xhr, status, error) {
						alert("Database review search failed");
						window.alert("Error: " + xhr.status + status + error);
					}
				});
            });
			$('#findList').hide();
			$('#findList').fadeIn(3000);
			$('textarea').characterCounter();
			$('select').material_select();
			$(".userReview").hide();
			$('.modal-trigger').leanModal();
        },
        error: function(xhr, status, error) {
            alert("Restaurant search failed");
            window.alert("Error: " + xhr.status + status + error);
        }
    });
}

function submitReview(dataID) {
	//Preparing variables to post '/review' and store in mongoDB
	var starRating = $("." + dataID + " :selected").val();
	starRating = Number(starRating);
	var writtenReview = $("." + dataID + " textarea").val();
	var restaurantName = $("." + dataID + " .placeName").text();
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0!
	var yyyy = today.getFullYear();
	var tempDate = mm + "/" + dd + "/" + yyyy;
	
	$.ajax({
        url: '/review',
        dataType: "json",
        data: {
			"restaurant": restaurantName,
            "rating": starRating,
            "written": writtenReview,
			"restaurantID": dataID,
			"date": tempDate
        },
        type: 'POST',
        success: function(data) {
			//Hide review form after clicking submit
			$("." + dataID + " .select-dropdown").val("Select Rating");
			$("." + dataID + " textarea").val("");
			$("." + dataID + " .userReview").hide();
			$("." + dataID + " .submitResult").text("Review successfully submitted!").removeClass("red-text").addClass("green-text");
			$("." + dataID + " .submitResult").hide();
			$("." + dataID + " .submitResult").fadeIn();
			
			//Adding review that was just posted to page. When user clicks 'find food' again or reloads page,
			//this review will be generated on the page get '/review' request, and will have a normal index.
			//For now, we give it a random index to avoid same index conflicts
			var index = Math.floor((Math.random() * 1000000000) + 100);
			$("div." + dataID + " .collection").append($("<li>").addClass("collection-item avatar " + index));
			$("div." + dataID + " .collection-item ." + index).append($("<i>supervisor_account</i>").addClass("material-icons circle light-blue lighten-1"));
			$("div." + dataID + " .collection-item ." + index).append($("<span>").addClass("title").text("Username - " + tempDate));
			$("div." + dataID + " .collection-item ." + index).append($("<p>").text(writtenReview));
			$("div." + dataID + " .collection-item ." + index).append($("<a>").addClass("secondary-content"));
			for(var i = 0; i < starRating; i++) {
				$("." + dataID + " .collection-item ." + index + " .secondary-content").append($("<i>grade</i>").addClass("material-icons"));
			}
        },
        error: function(xhr, status, error) {
            $("." + dataID + " .submitResult").text("There was an error! Please try again.");
            window.alert("Error: " + xhr.status + status + error);
        }
    });
}

function submitClicked(item) {
	//Review form validation
	if($("." + $(item).attr("id") + " textarea").val().length > 300) {
		$("." + $(item).attr("id") + " .submitResult").text("Reviews can only be 300 characters long.").removeClass("green-text").addClass("red-text");
		$("." + $(item).attr("id") + " .submitResult").hide();
		$("." + $(item).attr("id") + " .submitResult").fadeIn();
	} else if($("." + $(item).attr("id") + " textarea").val() && $("." + $(item).attr("id") + " .select-dropdown").val() != "Select Rating") {
		submitReview($(item).attr("id"));
	} else {
		$("." + $(item).attr("id") + " .submitResult").text("Please fill in all fields!").removeClass("green-text").addClass("red-text");
		$("." + $(item).attr("id") + " .submitResult").hide();
		$("." + $(item).attr("id") + " .submitResult").fadeIn();
	}
}

function revealReview(phone) {
	$("." + phone + " div.userReview").show();
	$("." + phone + " .submitResult").hide();
}

function clicked(item) {
	revealReview($(item).attr("id"));
}

$("#findFood").click(function(e){
	getLocation();
});
jQuery(document).ready(function($) {
    // create variables containing an array of keywords to trigger whatever action (ref: https://www.w3schools.com/js/js_arrays.asp)
	var integrisTriggerWords = ['markbook' , 'markbok' , 'mark book', 'makbook'];
	var irisTriggerWords = ['iris'];
	var bookingTriggerWords = ['booking', 'book', 'bork'];
	var cpomsTriggerWords = ['cpoms'];
	var footageTriggerWords = ['footage','cctv'];
	
	// We only want to display an alert the first time they type the word so
	// we need a variable that is changed from false to true when the alert is created
	// to keep track of that
	// Make sure to name it in a way that makes it obvious which array of words it's paired with
	var beenAlertedIntegris = false;
	var beenAlertedIris = false;
	var beenAlertedbooking = false;
	var beenAlertedcpoms = false;
	var beenAlertedfootage = false;
	
	// input_29_1 is the id value of the support ticket title textbox
	// input_29_2 is the id value of the support ticket description textbox
	// we are checking the content of those textboxes each time they release a key on the keyboard using keyup
	// (ref: https://api.jquery.com/keyup/)
    $('#input_29_1, #input_29_2').keyup(function() {
		
		// Each time a key is pressed we run the for loop below (so if we have dozens of different words to check it may get a bit slow)
		// looping through the array of keywords (ref: https://www.w3schools.com/js/js_loop_for.asp)
        // In this case, the for loop is going through each word in the integrisTriggerWords array
		for (var i = 0; i < integrisTriggerWords.length; i++) {
			
			// check if the alert has already been displayed
			// false was the initial value, so if it's still set to false, it means it hasn't been displayed yet
			if (beenAlertedIntegris == false) {
				
				// we are checking if the contents of the textbox contains the keyword at that array location
				// $(this) is referring to input_29_1 and .val() is getting the value (text written in it) of it
				// (ref: https://www.w3schools.com/jquery/html_val.asp)
				// .includes(x) is checking if that value does contain x and if it does it returns true
				// (ref: https://www.w3schools.com/jsref/jsref_includes.asp)
				if ($(this).val().toLowerCase().includes(integrisTriggerWords[i]) == true) {
					
					// if we get a match, it returns true and then we
					// prepend (insert at the beginning) the HTML code for a bootstrap alert box 
					// (ref: https://getbootstrap.com/docs/4.0/components/alerts/)
					
					// Uncomment the line below to display a proper browser alert box
					// alert('Please be aware, any Integris Markbook issues need to go up to the datateam!');
					
					$('#field_29_1').append( "<div class=\"alert alert-danger tada animated\" role=\"alert\">Please be aware,"
					+ " any Integris Markbook issues need to go up to the <a href=\"mailto:datateam@cheam.sutton.sch.uk\">"
					+ "DataTeam</a><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">"
					+ "<span aria-hidden=\"true\">&times;</span></button></div>");
					
					// As we have displayed the alert, we want to make sure it doesn't happen again
					// so we set the variable to true
					beenAlertedIntegris = true;
				}	
				
            }
        }
		
		// To check for the contents of another array we just copy/paste the loop below from <!START!> to <!END!>
		// You just have to remember to change the variable names to match the TriggerWords and the beenAlerted variable names
		// There are two TriggerWords and two beenAlerted references in the loop to rename
		// <!START!>
		for (var i = 0; i < irisTriggerWords.length; i++) {
			if (beenAlertedIris == false) {
				if ($(this).val().toLowerCase().includes(irisTriggerWords[i]) == true) {
					$('#field_29_1').append( "<div class=\"alert alert-danger tada animated\" role=\"alert\">Please contact"
					+ " <a href=\"http://intranet/staff/lroberts46\">Laura Roberts</a> if you have any issues or"
					+ " questions related to IRIS<button type=\"button\" class=\"close\" data-dismiss=\"alert\""
					+ " aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
					beenAlertedIris = true;
				}	
				
            }
        }
		// <!END!>
			
				for (var i = 0; i < cpomsTriggerWords.length; i++) {
			if (beenAlertedcpoms == false) {
				if ($(this).val().toLowerCase().includes(cpomsTriggerWords[i]) == true) {
					$('#field_29_1').append( "<div class=\"alert alert-danger tada animated\" role=\"alert\">Please contact"
					+ " <a href=\"http://intranet/staff/pvosper2\">Peter Vosper</a> if you have any issues or"
					+ " questions related to CPOMS<button type=\"button\" class=\"close\" data-dismiss=\"alert\""
					+ " aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
					beenAlertedcpoms = true;
				}	
		
            }	
		}
				for (var i = 0; i < bookingTriggerWords.length; i++) {
			if (beenAlertedbooking == false) {
				if ($(this).val().toLowerCase().includes(bookingTriggerWords[i]) == true) {
					$('#field_29_1').append( "<div class=\"alert alert-danger tada animated\" role=\"alert\">Please use the "
					+ " <a href=\"http://intranet/it-services/ipad-booking\">Ipad</a> or the "
					+ " <a href=\"http://intranet/it-services/computer-room-booking/\">Computer Room Booking</a> pages to book out these resources, Thanks"
					+ " <button type=\"button\" class=\"close\" data-dismiss=\"alert\""
					+ " aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
					beenAlertedbooking = true;
				}	
		
            }	
		}			
						for (var i = 0; i < footageTriggerWords.length; i++) {
			if (beenAlertedfootage == false) {
				if ($(this).val().toLowerCase().includes(footageTriggerWords[i]) == true) {
					$('#field_29_1').append( "<div class=\"alert alert-danger tada animated\" role=\"alert\">Please make sure you give us the correct camera name for footage requests "
					+ " by checking the <a href=\"http://intranet/chs-cctv\">Internal CCTV Page</a>, Thanks"
					+ " <button type=\"button\" class=\"close\" data-dismiss=\"alert\""
					+ " aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
					beenAlertedfootage = true;
				}	
		
            }	
		}			
        	// Paste new loops under this line
	
	// Do not change anything after this line	
    });
});
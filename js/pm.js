var maxCounter = 100;
var inputs;
var inputs2;

$(document).ready(function() {
	if (window.location.pathname == "/admin") {
		inputs = $('.gewichtet');
		for (var i = 0; i < inputs.length; i++) {
			inputs[i].addEventListener('input', maxReached);
		}
		inputs2 = $('.gnutzen');
		for (var i = 0; i < inputs2.length; i++) {
			inputs2[i].addEventListener('input', maxReached2);
		}
	}
	$('#erstelleNeueStrategie').on("click", function() {
		erstelleNeuesInputFeld($(this));
	});
	$('.glyphicon-remove').on('click', function() {
		entferneStrategie($(this));
	});

	//Berechne die gesamten Kosten pro Jahr
	if (window.location.pathname.split("/")[2] == "detailsKosten" || window.location.pathname.split("/")[2] == "speichereKosten") {
		var sum = parseInt($('#Intern1').val()) + parseInt($('#Extern1').val()) + parseInt($('#Sonstig1').val());
		$('#gkj1').html("" + sum + "");
		var sum = parseInt($('#Intern2').val()) + parseInt($('#Extern2').val()) + parseInt($('#Sonstig2').val());
		$('#gkj2').html("" + sum + "");
		var sum = parseInt($('#Intern3').val()) + parseInt($('#Extern3').val()) + parseInt($('#Sonstig3').val());
		$('#gkj3').html("" + sum + "");
		
		$('input').on("keyup", function() {
			var sum = parseInt($('#Intern1').val()) + parseInt($('#Extern1').val()) + parseInt($('#Sonstig1').val());
			$('#gkj1').html("" + sum + "");
			var sum = parseInt($('#Intern2').val()) + parseInt($('#Extern2').val()) + parseInt($('#Sonstig2').val());
			$('#gkj2').html("" + sum + "");
			var sum = parseInt($('#Intern3').val()) + parseInt($('#Extern3').val()) + parseInt($('#Sonstig3').val());
			$('#gkj3').html("" + sum + "");
		});
	}
	
	$('input[type="range"]').mousemove(function(e) {
		console.log("Test");
		console.log($(this).val());
	});
});
var getTotal = function() {
	var sum = 0;
	for (var i = 0; i < inputs.length; i++) {
		sum += parseInt(inputs[i].value, 10);
	}
	return sum;
};
var maxReached = function(e) {
	var sum = getTotal(), target;
	if (sum > maxCounter) {
		target = e.target;
		target.value = target.value - (sum - maxCounter);
		e.preventDefault();
		return false;
	}
	return true;
};
var getTotal2 = function() {
	var sum = 0;
	for (var i = 0; i < inputs2.length; i++) {
		sum += parseInt(inputs2[i].value, 10);
	}
	return sum;
};
var maxReached2 = function(e) {
	var sum = getTotal2(), target;
	if (sum > maxCounter) {
		target = e.target;
		target.value = target.value - (sum - maxCounter);
		e.preventDefault();
		return false;
	}
	return true;
};

function erstelleNeuesInputFeld(that) {
	//TODO: get id of last element!
	if ( typeof (that.parent().parent().find('input:last-child').attr("name")) != "undefined") {
		var nextid = parseInt(split('-' , that.parent().find('input :last-child').attr('id'))[1]) + 1;
	} else {
		var nextid = 0;
	}
	that.unbind('click');
	that.removeAttr("id");
	that.attr("name", "strategie-" + nextid);
	that.parent().find('.input-group-addon').removeClass('glyphicon-plus');
	that.parent().find('.input-group-addon').addClass('glyphicon-remove');
	that.parent().parent().append('<div class="input-group"><input class="form-control" id="erstelleNeueStrategie" type="text" placeholder="Hier neue Strategie eingeben" /><span class="input-group-addon glyphicon glyphicon-plus"></span></div>');
	that.parent().find('.input-group-addon').on('click', function() {
		entferneStrategie($(this));
	});
	$('#erstelleNeueStrategie').on("click", function() {
		erstelleNeuesInputFeld($(this));
	});
}

function entferneStrategie(that) {
	that.parent().remove();
}


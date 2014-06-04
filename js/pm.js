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
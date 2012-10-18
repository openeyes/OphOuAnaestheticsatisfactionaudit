
var scoreData;
var scoreElements = Array('respiratory_rate', 'oxygen_saturation', 'systolic', 'body_temp', 'heart_rate', 'conscious_lvl');

function calculateScore() {
	score = 0;
	for (var i = 0; i < scoreElements.length; i++) {
		el = scoreElements[i];
		selected_key = parseInt($('#Element_OphOuAnaestheticsatisfactionaudit_VitalSigns_' + el + '_id').val());
		if (scoreData[el][selected_key] !== undefined) {
			score += parseInt(scoreData[el][selected_key]);
		}
	}
	
	if (score > 3) {
		$('#liveMEWS').text(score).parent().addClass('highMEWS').show();
	}
	else {
		$('#liveMEWS').text(score).parent().removeClass('highMEWS').show();
	}
}

/* Module-specific javascript can be placed here */

$(document).ready(function() {
	$('#et_save').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			
			return true;
		}
		return false;
	});

	$('#et_cancel').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/update\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/update/','/view/');
			} else {
				window.location.href = '/patient/episodes/'+et_patient_id;
			}
		}
		return false;
	});

	$('#et_deleteevent').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();
			return true;
		}
		return false;
	});

	$('#et_canceldelete').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/delete/','/view/');
			} else {
				window.location.href = '/patient/episodes/'+et_patient_id;
			}
		} 
		return false;
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class');
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});
	
	$("div.Element_OphOuAnaestheticsatisfactionaudit_VitalSigns select").live('change', function () {
		calculateScore();
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}

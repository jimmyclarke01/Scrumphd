var value = document.querySelector('#value'),
    valuetext1 = document.querySelector('#value-text-1'),
	valuetext2 = document.querySelector('#value-text-2'),
	valuetext3 = document.querySelector('#value-text-3');

if (value.value == 5) {
		valuetext1.innerHTML = "Extremely important to most or all stakeholders"
		valuetext2.innerHTML = "Extreme impact on reputation of the project"
		valuetext3.innerHTML = "Critical to the success of the project"
	} else if (value.value == 4) {
		valuetext1.innerHTML = "Important to many stakeholders"
		valuetext2.innerHTML = "Significant impact on reputation of the project"
		valuetext3.innerHTML = "Significant competitive advantage"
	} else if (value.value == 3) {
		valuetext1.innerHTML = "Important to a moderate number of customers"
		valuetext2.innerHTML = "Moderate significant impact on brand or reputation"
		valuetext3.innerHTML = "Moderate important competitive advantage"
	} else if (value.value == 2) {
		valuetext1.innerHTML = "Important to only few customers"
		valuetext2.innerHTML = "Minor impact on brand or reputation"
		valuetext3.innerHTML = "Minor competitive advantage"
	} else {
		valuetext1.innerHTML = "Important to only a few or even no customers"
		valuetext2.innerHTML = "Little or no impact on brand or reputation"
		valuetext3.innerHTML = "Little or no competitive advantage"
	}

value.addEventListener('input', function () {
	
if (value.value == 5) {
		valuetext1.innerHTML = "Extremely important to most or all stakeholders"
		valuetext2.innerHTML = "Extreme impact on reputation of the project"
		valuetext3.innerHTML = "Critical to the success of the project"
	} else if (value.value == 4) {
		valuetext1.innerHTML = "Important to many stakeholders"
		valuetext2.innerHTML = "Significant impact on reputation of the project"
		valuetext3.innerHTML = "Significant competitive advantage"
	} else if (value.value == 3) {
		valuetext1.innerHTML = "Important to a moderate number of customers"
		valuetext2.innerHTML = "Moderate significant impact on brand or reputation"
		valuetext3.innerHTML = "Moderate important competitive advantage"
	} else if (value.value == 2) {
		valuetext1.innerHTML = "Important to only few customers"
		valuetext2.innerHTML = "Minor impact on brand or reputation"
		valuetext3.innerHTML = "Minor competitive advantage"
	} else {
		valuetext1.innerHTML = "Important to only a few or even no customers"
		valuetext2.innerHTML = "Little or no impact on brand or reputation"
		valuetext3.innerHTML = "Little or no competitive advantage"
	}
	
  
}, false);



var urgency = document.querySelector('#urgency'),
    urgencytext1 = document.querySelector('#urgency-text-1');
	urgencytext2 = document.querySelector('#urgency-text-2');
	urgencytext3 = document.querySelector('#urgency-text-3');

if (urgency.value == 5) {
		urgencytext1.innerHTML = "Extremely time constrained"
		urgencytext2.innerHTML = "Extreme level of dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "If not completed immediately there is little or no value to doing it"
	} else if (urgency.value == 4) {
		urgencytext1.innerHTML = "Highly time constrained"
		urgencytext2.innerHTML = "High level of dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "Important to go into the next sprint because of customer or contractual requirements"
	} else if (urgency.value == 3) {
		urgencytext1.innerHTML = "Moderately time constrained"
		urgencytext2.innerHTML = "Moderate dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "Desirable to complete in the next one or two sprints"
	} else if (urgency.value == 2) {
		urgencytext1.innerHTML = "Minimally time constrained"
		urgencytext2.innerHTML = "Minimal dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "Completion in the next two or three sprints is adequate"
	} else {
		urgencytext1.innerHTML = "Not time constrained"
		urgencytext2.innerHTML = "No dependencies"
		urgencytext3.innerHTML = "Little or no impact"
	}

urgency.addEventListener('input', function () {
	
	
  if (urgency.value == 5) {
		urgencytext1.innerHTML = "Extremely time constrained"
		urgencytext2.innerHTML = "Extreme level of dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "If not completed immediately there is little or no value to doing it"
	} else if (urgency.value == 4) {
		urgencytext1.innerHTML = "Highly time constrained"
		urgencytext2.innerHTML = "High level of dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "Important to go into the next sprint because of customer or contractual requirements"
	} else if (urgency.value == 3) {
		urgencytext1.innerHTML = "Moderately time constrained"
		urgencytext2.innerHTML = "Moderate dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "Desirable to complete in the next one or two sprints"
	} else if (urgency.value == 2) {
		urgencytext1.innerHTML = "Minimally time constrained"
		urgencytext2.innerHTML = "Minimal dependency of other items on the completion of this task"
		urgencytext3.innerHTML = "Completion in the next two or three sprints is adequate"
	} else {
		urgencytext1.innerHTML = "Not time constrained"
		urgencytext2.innerHTML = "No dependencies"
		urgencytext3.innerHTML = "Little or no impact"
	}
  
  
}, false);
	
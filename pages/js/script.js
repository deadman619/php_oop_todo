var ajaxData = new XMLHttpRequest();

ajaxData.onreadystatechange = function() {
	if (ajaxData.readyState === 4) {
		var tasks = JSON.parse(ajaxData.responseText);
		var table = "<table id='tasks' class='table'>";
		table += "<tr>";
		table += "<th>ID</th>";
		table += "<th>Subject</th>";
		table += "<th>Completion</th>";
		table += "<th>Removal</th>";
		table += "</tr>";
		for(task in tasks) {
			table += '<tr>';
			table += '<td>' + tasks[task]['ID'] + '</td>';
			if (tasks[task]['Completion'] == false) {
				table += '<td>' + tasks[task]['Subject'] + '</td>';
				table += '<td><a style="color: red" href=?update&id=' + tasks[task]['ID'] +
				 ' class="btn"><i class="far fa-square"></i></a></td>';
			} else {
				table += '<td><s>' + tasks[task]['Subject'] + '</s></td>';
				table += '<td><a style="color: green" href=?update&id=' + tasks[task]['ID'] +
				 ' class="btn"><i class="far fa-check-square"></i></a></td>';
			}
			table += '<td><a href=?delete&id=' + tasks[task]['ID'] +
			 ' class="btn"><i style="color: red;" class="fas fa-times"></i></a></td>';
			table += '</tr>';
		}
		table += '</table>';
		table += '<div class="text-center"><a id="new" class="btn btn-danger">Add Task</a><button id="filter" type=button class="btn btn-warning">Filter Completed</button></div>';
		document.getElementById('taskContainer').innerHTML = table;
		var newTask = document.getElementById('new');
		newTask.addEventListener('click', addNewTask);
		var filter = document.getElementById('filter');
		filter.addEventListener('click', filterCompleted);
	}
}

function displayTasks() {
	ajaxData.open('GET', '../tasks.json');
	ajaxData.send();
}

displayTasks();

function addNewTask() {
	var form = "<div class='container'>";
	form += "<form class='col-xs-offset-4 col-xs-4' id='newTaskForm'>";
	form += "<input class='form-control' name='newTaskValue' id='newTaskValue' type='text' placeholder='Task Name' style='margin: 50px 0'></input>";
	form += "<button name='confirm' id='confirm' class='btn btn-primary'>Confirm</button><button type='button' id='cancel' class='btn btn-danger'>Cancel</button>";
	form += "</form></div>";
	document.getElementById('newTaskForm').innerHTML = form;
	cancelClick = document.getElementById('cancel');
	cancelClick.addEventListener('click', cancelTask);
}

function filterCompleted() {
	var completed = document.getElementsByTagName('s');
	for (let item of completed) {
		item.parentNode.parentNode.style.display="none";
	}
}
var names = ["Ben", "Joel", "Judy", "Anne"];
var scores = [88, 98, 77, 88];

var $ = function (id) { return document.getElementById(id); };



window.onload = function () {
	$("display_results").onclick = displayResults;
	$("display_scores").onclick = displayScores;
	$("add").onclick = addScore;
};

function displayResults() {
    var average = 0;
    var highestScore = -Infinity;
    var highest_student;

    for (var i = 0; i < scores.length; i++) {
        average = (average * i + scores[i]) / (i + 1);
        if (scores[i] > highestScore) {
            highestScore = scores[i];
            highest_student=names[i];
        }
    }

    document.getElementById("results").innerHTML = "<h2>Results</h2><br/>" +
        "Average score = " + average.toFixed(2) + "<br/>" +
        "High score = " + highest_student + " with a score of " + highestScore;
}

function displayScores() {
    var table = "<tr><th>Name</th><th>Score</th></tr>";
    for (var i = 0; i < names.length; i++) {
        table += "<tr><td>" + names[i] + "</td><td>"+scores[i] + "</td></tr>";
    }
    document.getElementById("scores_table").innerHTML = table;
}
function addScore() {
    var nameInput = $("name").value;
    var scoreInput = parseInt($("score").value); 
    if (nameInput.trim() !== "" && !isNaN(scoreInput) && scoreInput >= 0 && scoreInput <= 100) {
        names.push(nameInput);
        scores.push(scoreInput);
        alert("Score added successfully.");
    } else {
        alert("You must enter a name and a valid score.");
    }

    $("name").value = "";
    $("score").value = "";
}






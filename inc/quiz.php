<?php

session_start();

// If user clicked Play Again button, start over
if (isset($_POST['restart'])) {
	session_destroy();
	header("location: index.php");
	exit();
}

// Import randomly generated questions
include('generate_questions.php');

// Randomly shuffle questions
shuffle($questions);

// define session variables if not already defined
if (!isset($_SESSION['score'])) {
	$_SESSION['score'] = 0;
}

if (!isset($_SESSION['currentQuestion'])) {
	$_SESSION['currentQuestion'] = 0;
}

if (!isset($_SESSION['askedQuestions'])) {
	$_SESSION['askedQuestions'] = [];
}

// Check answer to previous question and increase score if correct
if (isset($_POST['answer'])) {
	if ($_POST['correctAnswer'] === $_POST['answer']) {
		$_SESSION['score'] += 1;
		$toast = "Correct!";
	} else {
		$toast = "Incorrect";
	}
}

// define function to grab random question from questions array
function randomQuestion () {
	global $questions;
	do {
		$index = rand(0, count($questions) -1);
	} while (
		in_array($index, $_SESSION['askedQuestions'])
	);
	array_push($_SESSION['askedQuestions'], $index);
	return $questions[$index];
};

// if user is not on final question, get new question
if ($_SESSION['currentQuestion'] < 10) {
	$newQuestion = randomQuestion();

	// Shuffle answer buttons
	$answers = [$newQuestion["correctAnswer"],
				$newQuestion["firstIncorrectAnswer"],
				$newQuestion["secondIncorrectAnswer"]];

	shuffle($answers);

	// increase current question index
	$_SESSION['currentQuestion'] += 1;
	
} else {
	// if user is on final question, increase current question index to 11
	// so that no new questions are generated
	$_SESSION['currentQuestion'] = 11;
}


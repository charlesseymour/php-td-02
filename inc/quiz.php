<?php

session_start();
if (isset($_POST['restart'])) {
	session_destroy();
	header("location: index.php");
	exit();
}
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * These comments are to help you get started.
 * You may split the file and move the comments around as needed.
 *
 * You will find examples of formating in the index.php script.
 * Make sure you update the index file to use this PHP script, and persist the users answers.
 *
 * For the questions, you may use:
 *  1. PHP array of questions
 *  2. json formated questions
 *  3. auto generate questions
 *
 */

// Include questions



include('generate_questions.php');

shuffle($questions);

if (!isset($_SESSION['score'])) {
	$_SESSION['score'] = 0;
}

if (!isset($_SESSION['currentQuestion'])) {
	$_SESSION['currentQuestion'] = 0;
}

// Keep track of which questions have been asked

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

// Show which question they are on
// Show random question

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

if ($_SESSION['currentQuestion'] < 10) {
	$newQuestion = randomQuestion();

	// Shuffle answer buttons

	$answers = [$newQuestion["correctAnswer"],
				$newQuestion["firstIncorrectAnswer"],
				$newQuestion["secondIncorrectAnswer"]];

	shuffle($answers);

// Toast correct and incorrect answers
// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question

	$_SESSION['currentQuestion'] += 1;
	
} else {
	$_SESSION['currentQuestion'] = 11;
}

// Show score

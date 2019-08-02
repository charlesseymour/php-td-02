<?php
session_start();
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

$_SESSION['score'] = 0;
$_SESSION['currentQuestion'] = 1;

// Keep track of which questions have been asked

$askedQuestions = [];

// Show which question they are on
// Show random question

function randomQuestion () {
	global $questions, $askedQuestions;

	do {
		$index = rand(0, count($questions) -1 );
	} while (
		in_array($index, $askedQuestions)
	);
	array_push($askedQuestions, $index);
	return $questions[$index];
};

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


// Show score

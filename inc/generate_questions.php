<?php
// Generate random questions

$questions = [];

// Loop for required number of questions

for ($i = 0; $i < 10; $i++) {

  // Get random numbers to add

  $questions[$i]["leftAdder"] = rand(1, 99);
  $questions[$i]["rightAdder"] = rand(1, 99);

  // Calculate correct answer

  $questions[$i]["correctAnswer"] = $questions[$i]["leftAdder"] +
                                    $questions[$i]["rightAdder"];

  // Get incorrect answers within 10 numbers either way of correct answer
  // Make sure it is a unique answer

  do {
    $n = rand($questions[$i]["correctAnswer"] - 10,
              $questions[$i]["correctAnswer"] + 10);
  } while (
    $n === $questions[$i]["correctAnswer"]
  );

  $questions[$i]["firstIncorrectAnswer"] = $n;

  do {
    $n = rand($questions[$i]["correctAnswer"] - 10,
              $questions[$i]["correctAnswer"] + 10);
  } while (
    $n === $questions[$i]["correctAnswer"] || 
    $n === $questions[$i]["firstIncorrectAnswer"]
  );

  $questions[$i]["secondIncorrectAnswer"] = $n;
}

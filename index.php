<?php include('inc/quiz.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <p class="breadcrumbs">Question <?php echo($currentQuestion); ?> of 10</p>
            <p class="quiz">What is <?php echo($newQuestion["leftAdder"] . " + " .
									$newQuestion["rightAdder"]); ?>?</p>
            <form action="index.html" method="post">
                <input type="hidden" name="id" value="0" />
                <input type="submit" class="btn" name="answer" value="<?php echo($answers[0]); ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo($answers[1]); ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo($answers[2]); ?>" />
            </form>
        </div>
    </div>
</body>
</html>
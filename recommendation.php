<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindProbe Recommendations</title>
    <link rel="stylesheet" href="assets/css/recommendationstyle.css">
</head>
<body>
<script src="headscript.js"></script> 
<?php include 'header.php'; ?>
<br>
<section data-bs-version="5.1" class="contacts01 cid-ucj46ce8ro" id="contacts-1-ucj46ce8ro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                 
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include'config.php';
                // Calculate the total score
                $total_score = 0;
                $questions_query = "SELECT question_id FROM questions WHERE disease_id = 1";
                $questions_result = mysqli_query($conn, $questions_query);
                if (mysqli_num_rows($questions_result) > 0) {
                    while ($question_row = mysqli_fetch_assoc($questions_result)) {
                        $question_id = $question_row['question_id'];
                        if (isset($_POST["input_$question_id"])) {
                            $total_score += intval($_POST["input_$question_id"]);
                        }
                    }
                }

                // Recommendations section
                echo "<div class='item features-without-image col-12 col-md-6 active'>";
                echo "<div class='item-wrapper'>";
                echo "<div class='text-wrapper'>";
                $recommendations_query = "SELECT r.rec_text, e.exercise_type, e.video_link 
                                          FROM recommendation r 
                                          INNER JOIN exercises e ON r.exercise_id = e.exercise_id 
                                          WHERE r.disease_id = 1 AND r.score <= $total_score ORDER BY r.score DESC LIMIT 1";

                $recommendations_result = mysqli_query($conn, $recommendations_query);

                if (mysqli_num_rows($recommendations_result) > 0) {
                    while ($row = mysqli_fetch_assoc($recommendations_result)) {
                        // Extract YouTube video ID from the video link
                        preg_match("/v=([^&]+)/", $row['video_link'], $matches);
                        $video_id = $matches[1];

                        echo "<h6 class='card-title mbr-fonts-style mb-3 display-5'><strong>Suggestions</strong></h6>";
                        echo "<p class='mbr-text mbr-fonts-style display-7'>{$row['rec_text']}</p>";
                        echo "<p class='mbr-text mbr-fonts-style display-7'>Do {$row['exercise_type']} Exercise to maintain Your Health Condition</p>";
                        echo "<div class='video-container'>";
                        echo "<iframe class='video-thumbnail' src='https://www.youtube.com/embed/{$video_id}' frameborder='0' allowfullscreen></iframe>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='mbr-text mbr-fonts-style display-7'>No recommendations found</p>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";

                // Doctors section
                if ($total_score > 15) {
                    echo "<div class='item features-without-image col-12 col-md-6'>";
                    echo "<div class='item-wrapper'>";
                    echo "<div class='text-wrapper'>";
                    $doctors_query = "SELECT name, phone, image, address, details FROM doctors WHERE disease_id = 1";
                    $doctors_result = mysqli_query($conn, $doctors_query);

                    if (mysqli_num_rows($doctors_result) > 0) {
                        while ($row = mysqli_fetch_assoc($doctors_result)) {
                            echo "<h6 class='card-title mbr-fonts-style mb-3 display-5'><strong>Doctor Details</strong></h6>";
                            echo "<div class='doctor'>";
                            echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Doctor Image' class='doctor-img'>";
                            echo "<h3 class='card-title mbr-fonts-style mb-3 display-5'><strong>Dr. {$row['name']}</strong></h3>";
                            echo "<p class='mbr-text mbr-fonts-style display-7'>{$row['details']}</p>";
                            echo "<p class='mbr-text mbr-fonts-style display-7'><strong>Phone:</strong> {$row['phone']}</p>";
                            echo "<p class='mbr-text mbr-fonts-style display-7'><strong>Address:</strong> {$row['address']}</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='mbr-text mbr-fonts-style display-7'>No doctors found</p>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }

                // Close the database connection
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>

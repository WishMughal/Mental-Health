<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindProbe Bipolar Disorder Test</title>
    <link rel="stylesheet" href="assets/css/testformstyle.css"> <!-- Update with the correct path -->
</head>
<body>
<script src="headscript.js"></script>
<?php include 'header.php'; ?>
<p><br><br><br><br><br></p>

    <form id="DepressionForm" method="post" action="userdatastore.php">
        <div class='container mt-sm-5 my-1'>
            <div class='question ml-sm-5 pl-sm-5 pt-2'>
            <div class="heading">
             <h2 style="text-align: center; margin-top: 0.25in;"><b>Bipolar Disorder</b></h2><br>
            </div>
                <div class="py-2 h5"><b>Over the last 2 weeks, how often have you been bothered by any of the following problems?</b></div>
                <div class="py-2"><p>Please note, all fields are required.</p></div>
                <div class='form_body'>
                    <div class='gform_page_fields'>
                        <div id='gform_fields_1' class='gform_fields top_label form_sublabel_below description_above validation_below'>
                            <?php
                            include'config.php';

                            // Fetch questions for disease_id 1 (Depression)
                            $query = "SELECT * FROM questions WHERE disease_id = 3";
                            $result = mysqli_query($conn, $query);

                            $counter=1;

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $question_id = $row['question_id'];
                                    $question_text = $row['question_text'];

                                    echo "<fieldset id='field_$question_id' class='field_$question_id'>";
                                    echo "<legend class='question'>$counter. $question_text <span class='gfield_required'><span class='gfield_required gfield_required_asterisk'>*</span></span></legend>";
                                    $counter++;
                                    
                                    echo "<div class='ginput_container_radio ginput_container_inline'>";
                                    echo "<div class='gfield_radio' id='input_$question_id'>";
                                    

                                    // Fetch options for the current question
                                    $options_query = "SELECT * FROM options WHERE question_id = $question_id AND disease_id = 3";
                                    $options_result = mysqli_query($conn, $options_query);
                                    if (mysqli_num_rows($options_result) > 0) {
                                        echo "<div class='ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3' id='options'>";
                                        while ($option_row = mysqli_fetch_assoc($options_result)) {
                                            $option_id = $option_row['option_id'];
                                            $option_value = $option_row['option_value'];
                                            $option_text = $option_row['option_text'];

                                            echo "<label class='options'>$option_text";
                                            echo "<input class='gfield-choice-input' name='input_$question_id' type='radio' value='$option_value' id='choice_1_$question_id$option_id' onchange='gformToggleRadioOther(this)' />";
                                            echo "<span class='checkmark'></span>";
                                            echo "</label>";
                                        }
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</fieldset>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <div class="ml-auto mr-sm-5">
                        <button class="btn btn-success">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="path/to/your/scripts.js"></script> <!-- Update with the correct path -->
</body>
</html>

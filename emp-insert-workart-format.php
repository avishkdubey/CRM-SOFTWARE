<?php

use SimpleExcel\SimpleExcel;

// Initialize a variable to track the success status
$success = true;

if (move_uploaded_file($_FILES['workart_format']['tmp_name'], 'candidates/' . $_FILES['workart_format']['name'])) {
    require_once('SimpleExcel/SimpleExcel.php');

    $excel = new SimpleExcel('csv');

    $excel->parser->loadFile('candidates/' . $_FILES['workart_format']['name']);

    $foo = $excel->parser->getField();

    $count = 1;
    include('connection.php');
    $currentDateTime = date("Y-m-d H:i:s");


    while (count($foo) > $count) {
        $name = $foo[$count][0];
        $phone = $foo[$count][1];
        $email = $foo[$count][2];
        $alternate_phone = $foo[$count][3];
        $current_location = $foo[$count][4];
        $experience = $foo[$count][5];
        $cctc = $foo[$count][6];
        $ectc = $foo[$count][7];
        $notice_period = $foo[$count][8];
        $position = $foo[$count][9];
        $gender = $foo[$count][10];
        $age = $foo[$count][11];
        $l_working = $foo[$count][12];
        $comment = $foo[$count][13];
        $exit_reason = $foo[$count][14];
        $resume = $foo[$count][15];
        $naukri = $foo[$count][15];
        $linkedin = $foo[$count][16];
        $portfolio = $foo[$count][17];

        $query = "INSERT INTO candidate_details(candidate_name, candidate_mobile, candidate_email, candidate_alternate_mobile, candidate_current_location, candidate_experience, candidate_current_ctc, candidate_expected_ctc, candidate_notice_period, candidate_position, candidate_gender, candidate_age, candidate_last_working_date, candidate_comment, candidate_exit_reason, candidate_resume_link, candidate_naukri_url, candidate_linkedin_url, candidate_portfolio_url) VALUES ('$name','$phone','$email','$alternate_phone','$current_location','$experience','$cctc','$ectc','$notice_period','$position','$gender','$age','$l_working','$comment','$exit_reason','$resume','$naukri','$linkedin','$portfolio')";

        if (!mysqli_query($conn, $query)) {
            // If an error occurs, set the success status to false
            $success = false;
            break; // Exit the loop
        }

        $count++;
    }

    // Check the success status
    if ($success) {
        echo 1; // Data was successfully inserted
    } else {
        echo 2; // An error occurred during data insertion
    }
}

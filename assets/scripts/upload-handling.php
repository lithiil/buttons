<?php

/**
 * Process file upload.
 */
if (isset($_POST['submit'])) {
    $user = isset($_POST['name']) ? $_POST['name'] : 0;
    $targetDir = 'approve/' . $user . '/';
    $targetFile = $targetDir . basename($_FILES['fileToUpload']['name']);

    $uploadOk = false;
    $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

    if ($fileType == 'mp3' && $_FILES['fileToUpload']['size'] > 2000) {
        if (!is_dir($targetDir)) {
            mkdir('approve/' . $user . '/');
        }

        $uploadOk = true;
    } elseif ($fileType != 'mp3' || $_FILES['fileToUpload']['size'] > 10000) {
        header('Location: buttons.php?error=1');
        exit;
    }

    /**
     * Great success!
     */
    if ($uploadOk == 1 && move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
        // Send email notification if set
        if (UPLOAD_EMAIL !== null) {
            mail(UPLOAD_EMAIL, 'Buttons Upload', $user.' just uploaded a file, please check it when you have time!');
        }

        header('Location: buttons.php?success=1');
        exit;
    }
}

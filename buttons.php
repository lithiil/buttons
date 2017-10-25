<?php
include ('assets/scripts/config.php');
include ('assets/scripts/audio.php');
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1 ,user-scalable=no"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>De Batonz</title>
</head>
<body>
    <div class="searchbar">
        <input type="text" id="search" class="fixbar search-query form-control" placeholder="Search" autocomplete="off"/>
    </div>

    <?php
    if (UPLOAD_ENABLED) {
        include ('assets/scripts/upload-form.php');
        include ('assets/scripts/upload-handling.php');
    }
    ?>

    <style id="search_style"></style>

    <?php
    if (UPLOAD_ENABLED && isset($_GET['success'])) {
        ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="closeMod">x</span>
                    <h2>Upload Successfull!</h2>
                </div>
            </div>
        </div>
        <?php
    }

    if (UPLOAD_ENABLED && isset($_GET['error'])) {
        ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="closeMod">x</span>
                    <h2>Upload Failed!</h2>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="content">
        <?php
        foreach (Audio::getFiles() as $audioFile) {
            ?>
            <button class="btn btn-default blue-circle-button searchable" data-index="<?php echo strtolower($audioFile); ?>">
                <span style="display: none;"><?php echo $audioFile ?></span>
                <span class="blue-circle-greater-than"></span>
                <a href="buttons.bigteddy.ro/audio/<?php echo $audioFile;?>.mp3"></a>
            </button>
            <?php
        }
        ?>
    </div>

    <audio id="audio"></audio>
    <script src="assets/js/main.js"></script>
</body>
</html>

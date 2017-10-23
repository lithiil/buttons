<?php

$audioFiles = [];
// $dir is the path to the Folder that contains your Audio file
$dir = 'audio';

$files = scandir($dir);

foreach ($files as $file) {
    if ($file === '.' or $file === '..') continue;
    $file = str_replace('.mp3', '', $file);
    array_push($audioFiles, $file);
    if (strlen($file) > 15) {

    }
}

//Upload Module, uncomment the code below if you want the upload feature to work

//$user = isset($_POST["name"]) ? $_POST["name"] : 0;
//$target_dir = "approve/" . $user . "/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$uploadOk = 0;
//$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
//
//
//// Check if sound file is a actual sound or nah
//
//if (isset($_POST["submit"]) && $fileType == "mp3" && $_FILES["fileToUpload"]["size"] > 2000) {
//
//    if (!is_dir($target_dir)) {
//        mkdir("approve/" . $user . "/");
//    }
//    $uploadOk = 1;
//} elseif (isset($_POST["submit"]) && $fileType != "mp3" || $_FILES["fileToUpload"]["size"] > 10000) {
//
//    echo "<div id=\"myModal\" class=\"modal\">
//
//    <!-- Modal content -->
//    <div class=\"modal-content\">
//        <div class=\"modal-header\">
//            <span class=\"close\" id=\"closeMod\">x</span>
//            <h2>Upload Failed!</h2>
//        </div>
//    </div>
//
//</div>";
//}
//
//if ($uploadOk == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//    echo "<div id=\"myModal\" class=\"modal\">
//
//    <!-- Modal content -->
//    <div class=\"modal-content\">
//        <div class=\"modal-header\">
//            <span class=\"close\" id=\"closeMod\">x</span>
//            <h2>Upload Successfull!</h2>
//        </div>
//    </div>
//
//</div>";
//
//    // Set the email Address to the address that you whish to receive this allert!
//
//    mail("example@domain.com", "Buttons Upload", $user." just uploaded a file, please check it when you have time!");
//
//}

?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1 ,user-scalable=no"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css" type="text/css">
    <link rel="stylesheet" href="tooltips.css" type="text/css">
    <link rel="icon" type="image/png" href="favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <title>De Batonz</title>
</head>
<body>
<div class="searchbar">
    <input type="text" id="search" class="fixbar search-query form-control" placeholder="Search" autocomplete="off"/>
</div>

<!--This is the upload html. You can comment/uncomment it out if you don`t want an upload feature!-->
<!--<input class="chk" id="toggle" type="checkbox">-->
<!--<label for="toggle" class="chk" id="delabel">Upload</label>-->
<!--<div class="menu" id="expand">-->
<!--    <form action="buttons.php" method="post" enctype="multipart/form-data">-->
<!--        <input id="name" name="name" type="text" placeholder="Your name"-->
<!--               class="upload" required minlength="4" maxlength="20" autocomplete="off"-->
<!--               autocorrect=off autocapitalize=words autofocus pattern="[A-Za-z]{4,20}"-->
<!--               title="4-20 alphabet characters only">-->
<!--        <input type="file" class="upload" name="fileToUpload" id="fileToUpload"  required>-->
<!--        <input type="submit" class="upload" value="Upload" name="submit" id="upload-submit" title="The file must be mp3 and have less than 10mb">-->
<!--    </form>-->
<!--</div>-->
<!--This is the end of the upload-->

<style id="search_style"></style>

<div class="content">
    <?php
    foreach ($audioFiles as $audioFile) {
        ?>
        <button class="btn btn-default blue-circle-button searchable" data-index="<?= strtolower($audioFile); ?>">
            <span style="display: none;"><?= $audioFile ?></span><span class="blue-circle-greater-than"></span><a
                    href="<?= "buttons.bigteddy.ro/audio/" . $audioFile . ".mp3" ?>"></a></button>
        <?php
    }
    ?>
</div>
<audio id="audio"></audio>

</body>
<footer>
    <script>
        var searchStyle = document.getElementById('search_style');

        function doInput() {
            if (!this.value) {
                searchStyle.innerHTML = "";
                return;
            }
            console.log(this.value.toLowerCase());
            searchStyle.innerHTML = ".searchable:not([data-index*=\"" + this.value.toLowerCase() + "\"]) { display: none; }";
        }

        document.getElementById('search').addEventListener('input', doInput);

        function activateHashSearch() {
            $("#search").val(window.location.hash.replace("#", ""));
            doInput.apply(document.getElementById('search'), []);
        }

        $(document).ready(function () {

            activateHashSearch();

            $(window).on("hashchange", activateHashSearch);

            $(".btn").click(function (e) {
                var audio = "audio/" + $.trim($(this).text()) + ".mp3";
                $.trim(audio);
                $("#audio").attr("src", audio)[0].play();
            });
            $("#search").keyup(function () {
                window.location.hash = $(this).val();
            });
        });

        $(document).ready(function () {
            var modal = $('#myModal');
            modal.show();


            modal.find('.close').click(function (e) {
                e.preventDefault();
                modal.slideUp();
//                window.location.replace("https://domain.com");
            });
        });

    </script>

</footer>

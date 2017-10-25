<input class="chk" id="toggle" type="checkbox">
<label for="toggle" class="chk" id="delabel">Upload</label>
<div class="menu" id="expand">
    <form action="buttons.php" method="post" enctype="multipart/form-data">
        <input id="name" name="name" type="text" placeholder="Your name"
               class="upload" required minlength="4" maxlength="20" autocomplete="off"
               autocorrect=off autocapitalize=words autofocus pattern="[A-Za-z]{4,20}"
               title="4-20 alphabet characters only">
        <input type="file" class="upload" name="fileToUpload" id="fileToUpload"  required>
        <input type="submit" class="upload" value="Upload" name="submit" id="upload-submit" title="The file must be mp3 and have less than 10mb">
    </form>
</div>


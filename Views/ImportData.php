<br>
<a href="clear" <button>Clear all records</button></a>
<br><br>
<form method="post" role="form" action="saveFile" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" id="inputfile" name="inputfile">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="save" value="submit">Upload</button>
</form>
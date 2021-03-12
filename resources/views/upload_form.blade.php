<form action="upload" enctype="multipart/form-data" method="post">
{{ csrf_field() }} 
<br>
Select Multiple Photos: <br>
<input multiple="multiple" name="photos[]" type="file"> 
<br><br>
<input type="submit" value="Upload">
</form>

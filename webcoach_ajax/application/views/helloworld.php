<html>
<head></head>
</body>
<?php echo validation_errors(); ?>
<?php echo form_open('speed/insert_to_db'); ?>

Branch: <input type="text" name="branch" /><br/>
Business Unit: <input type="text" name="buinessUnit" /><br/>
Device Type: <input type="text" name="deviceType" /><br/>
Brand: <input type="text" name="brand" /><br/>
Device Model: <input type="text" name="deviceModel" /><br/>
SN: <input type="text" name="SN" /><br/>
status: <input type="text" name="status" /><br/>
department: <input type="text" name="department" /><br/>
username: <input type="text" name="username" /><br/>
notes: <input type="textarea" name="notes" /><br/>
computername: <input type="text" name="computerName" /><br/>
Save:<input type="submit" name="save" />

</form>
</body>
</html>
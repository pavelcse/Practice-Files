<!-- replace views/create.php file this file -->
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div style="margin-top: 5%;" class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3 well">
        <?php
        $message = $this->session->flashdata('message');
        if ($message) {
            echo '<div class="alert alert-info">' . $message . '</div>';
        }
        ?>
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="username" value="<?php echo isset($users[0]['username']) ? $users[0]['username'] : set_value('username'); ?>" required/>
                </div>
            </div>

            <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>


            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="email" value="<?php echo isset($users[0]['email']) ? $users[0]['email'] : set_value('email'); ?>" required/>
                </div>
            </div>

            <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">About</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="8" name="about"><?php echo isset($users[0]['about']) ? $users[0]['about'] : set_value('about'); ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Avatar</label>
                <div class="col-sm-8">
                    <input type="file" name="avatar"/>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo isset($users[0]['id']) ? $users[0]['id'] : ''; ?>"/>


            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input class="btn btn-info" type="submit" name="submit" value="<?php echo $button; ?>"/>
                </div>
            </div>
        </form>
    </div>
</div>


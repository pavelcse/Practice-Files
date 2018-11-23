<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div style="margin-top: 5%;" class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <p><a class="btn btn-lg btn-info" href="<?php echo site_url('users/create'); ?>">Create New User</a></p>
        <div class="table-responsive">
            <form action="<?php echo site_url('users/save'); ?>" method="post">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>About</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($users as $user): $segment++; ?>
                            <tr>
                                <th scope="row"><?php echo $segment; ?></th>
                                <td class="username"><?php echo $user['username']; ?></td>
                                <td class="email"><?php echo $user['email']; ?></td>
                                <td><?php echo $user['about']; ?></td>
                                <td class="col-sm-1">
                                    <span class="edit glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Edit this User"></span>
                                    <span class="save glyphicon glyphicon-floppy-disk supress_icon" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Save"></span>
                                    <span class="cancel glyphicon glyphicon-remove supress_icon" data-toggle="tooltip" data-placement="top" title="Cancel" ></span>
                                    <input class="usernamed" type="hidden" value=""/>
                                    <input class="maild" type="hidden" value=""/>
                                    <input class="user_id" type="hidden" value="<?php echo $user['id']; ?>"/>
                                </td>

                                <td>
                                    <a onclick="return confirm('Are you sure?');" href="<?php echo site_url('users/delete_user') . '/' . $user['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <input id="base_url" type="hidden" value="<?php echo base_url();?>"/>
                 <input id="site_url" type="hidden" value="<?php echo site_url();?>"/>
            </form>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>


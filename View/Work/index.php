<?php include '../Layout/header.php' ?>
<?php require '../../Helper/Status.php' ?>
<?php require '../../Model/Work.php' ?>
    <div class="container" id="work">
        <button id="add" class="btn btn-success">ADD</button>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Work Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $works = (new Work())->all() ?>
            <?php if ($works->num_rows > 0): ?>
                <?php foreach ($works as $work): ?>
                    <tr data-id="<?php echo $work['work_id'] ?>">
                        <td><?php echo $work['work_name'] ?></td>
                        <td><?php echo $work['start_date'] ?></td>
                        <td><?php echo $work['end_date'] ?></td>
                        <td class="text-center">
                            <?php echo Status::get($work['status']) ?>
                        </td>
                        <td>
                            <button class="btn btn-primary edit">EDIT</button>
                            <button class="btn btn-danger delete">DELETE</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="99" class="text-center">HAVE NO DATA</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

        <!-- modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" action="/Controller/Work/InsertUpdate.php">
                            <div class="form-group">
                                <label for="work_name">Work Name</label>
                                <input type="text" class="form-control" id="work_name" name="work_name" placeholder="Enter Work Name"
                                       required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <div class="input-group effective_calendar">
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control" id="start_date" name="start_date" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <div class="input-group effective_calendar">
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control" id="end_date" name="end_date" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">-----</option>
                                    <?php foreach (Status::$title as $status => $title): ?>
                                        <option value="<?= $status ?>"><?= $title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php include '../Layout/footer.php' ?>
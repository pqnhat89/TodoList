<?php include '../Layout/header.php' ?>
<?php require '../../Controller/WorkController.php' ?>
<?php require '../../Helper/Status.php' ?>
    <div class="container">
        <table class="table table-bordered table-hover" id="work">
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
            <?php $works = (new WorkController())->index() ?>
            <?php if ($works->num_rows > 0): ?>
                <?php foreach ($works as $work): ?>
                    <tr>
                        <td><?php echo $work['word_name'] ?></td>
                        <td><?php echo $work['start_date'] ?></td>
                        <td><?php echo $work['end_date'] ?></td>
                        <td class="text-center">
                            <?php echo Status::get($work['status']) ?>
                        </td>
                        <td>
                            <button id="edit" class="btn btn-primary">EDIT</button>
                            <button id="delete" class="btn btn-danger">DELETE</button>
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
    </div>
<?php include '../Layout/footer.php' ?>
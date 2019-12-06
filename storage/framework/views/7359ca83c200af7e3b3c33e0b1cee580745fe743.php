<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">
    <div class="row">
    <form action="<?php echo e(route('history.filter',['keyword','date','group'])); ?>">
      <div class="col-md-4">
        <input type="text" placeholder="Search" name="search" class="form-control">
      </div>
      <div class="col-md-4">
        <input type="text"  id="datetimepicker1" placeholder="Date" name="date_time" class="form-control">
      </div>
      <div class="col-md-4">
        <select class="form-control" name="group">
          <option value="" selected>All Groups</option>
          <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($g->id); ?>"><?php echo e($g->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br>
        <input type="submit" class="btn btn-primary" value="Filter">
      </div>
      </form>
    </div>
        <div class="row">
        <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Group Name</th>
      <th>Group Type</th>
      <th>Account Name</th>
      <th>Post Text</th>
      <th>Time</th>

    </tr>
  </thead>
  <tbody>

  <?php $__currentLoopData = $buffer_posting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>

      <td><?php echo e($buffer->groupInfo->name); ?></td>
      <td><?php echo e($buffer->groupInfo->type); ?></td>
      <td><img src="<?php echo e($buffer->accountInfo->avatar); ?>" class="img img-circle" style="width:50px;height:50px;"/></td>
      <td><?php echo e($buffer->post->text); ?></td>
      <td><?php echo e($buffer->sent_at); ?></td>
      </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>
</table>
<?php echo e($buffer_posting->links()); ?>


        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script type="text/javascript">
                $(function () {
		$('#datetimepicker1').datepicker({
			format: 'DD-MM-YYYY LT'
		});
	});
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
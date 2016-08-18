<?php
/**
 * Sample layout
 */

use Core\Language;

?>


<div class="adminPanelArea">
		<div class="topHeading">
		  <h1>Dashboard</h1>
	  </div>
		<div class="panel panel-primary" data-collapsed="0"> <!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title"><h2>Welcome to JUNO</h2></div>
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
				</div>
		<div class="panel-body">
			<p>Juno is a user-friendly content management system.  With Juno you can easily build dynamic websites within a matter of minutes with just the click of your mouse!  Maintain your web content, navigation and even limit what groups or specific users can access, from anywhere in the world with just a web browser!  With an emphasis on security and functionality, Juno is a professional and robust system suitable for any business or organizations website. </p>
		</div>

</div>
<div class="row admin-row row-50">
	<div class="admin-row-heading">
			Google Analytics
	</div>
	<canvas id="analytics" width="400" height="170"></canvas>
  <script>
  var ctx = $("#analytics");
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Jan", "Feb", "Mar", "April", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
          datasets: [{
              label: 'Page Visits',
              data: [27, 19, 45, 65, 27, 0],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>
</div>
<div class="row admin-row row-50">
	<div class="admin-row-heading">
			Most Visited Pages
	</div>
	<canvas id="visits" width="400" height="170"></canvas>
  <script>
  var ctx = $("#visits");
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Home", "About", "Products", "Contact"],
          datasets: [{
              label: 'Page Visits',
              data: [17, 8, 22, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 0
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>
</div>
<div class="row admin-row row-50">
	<div class="admin-row-heading">
			New Web Pages
	</div>
	<div class="dashTable">
		<table class="dashboard-table">
			<thead>
					<th>Page Name</th>
					<th>Page Url</th>
					<th>Edit</th>
					<th>View</th>
			</thead>
			<tbody>

					<?php if($data['newPages']){ ?>
							<?php	foreach ($data['newPages'] as $row) { ?>
								<tr>
									<td><?php if($row->parentPage > 0){  echo '-'; ?> <?php } ?><?php echo $row->pageName; ?></td>
									<td><a href="/<?php echo $row->pageUrl; ?>" target="_blank">/<?php echo $row->pageUrl; ?></a></td>
									<td><a href="/admin/pages/edit/<?php echo $row->pageId; ?>"><i class="fa fa-pencil-square"></i></a></td>
									<td><a href="/<?php echo $row->pageUrl; ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
									</tr>
								<?php } ?>
					<?php } ?>

			</tbody>

		</table>
</div>
</div>
<div class="row admin-row row-50">
	<div class="admin-row-heading">
			New Content Areas
	</div>
	<div class="dashTable">
		<table class="dashboard-table">
			<thead>
					<th>Content Area Name</th>
					<th>Edit Content Area</th>
			</thead>
			<tbody>

					<?php if($data['newBlocks']){ ?>
							<?php	foreach ($data['newBlocks'] as $row) { ?>
									<tr>
										<td><?php echo $row->blockName; ?></td>
										<td><a href="/admin/contentblock/edit/<?php echo $row->blockId; ?>"><i class="fa fa-pencil-square"></i></a></td>
									</tr>
								<?php } ?>
					<?php } ?>

			</tbody>

		</table>
</div>
</div>
</div>

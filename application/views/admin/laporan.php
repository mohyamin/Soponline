<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title> Data Log User</title>
</head><style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    .container {
        padding: 8px;
        text-align: center;
    }
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    
</style><body>
<div class="container">
    <div class="row">
      <div class="col">
        <h2 class="text-center">Data Laporan Log User SopOnline</h2>
      </div>
    </div>
  </div>
  <br>
  <br>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>No</th>
                <th>User Name</th>
                <th>Access Features</th>
                <th>User Activity</th>
                <th>Create Date</th>

            </tr>
            <?php
            $no = 1;
            foreach ($list as $l) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $l->full_name ?></td>
                    <td><?php echo $l->fitur ?></td>
                    <td><?php echo $l->keterangan ?></td>
                    <td><?php echo $l->cretead_at ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body></html>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h3>Log Aktivitas User</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Fitur</th>
                <th>Keterangan</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($logs as $log): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $log->full_name ?></td>
                    <td><?= $log->fitur ?></td>
                    <td><?= $log->keterangan ?></td>
                    <td><?= $log->cretead_at ?></td>
                    <td><?= $log->update_at ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
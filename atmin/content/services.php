<?php
$queryPorto = mysqli_query($connection, "SELECT * FROM services ORDER BY id DESC");
$rowPorto = mysqli_fetch_all($queryPorto, MYSQLI_ASSOC);
?>

<div class="pagetitle">
    <h1>Services Content</h1>
</div><!-- End Page Title -->

<section class="section">

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Services Content</h5>

                    <div class="mb-3" align="right">
                        <a href="?page=tambah-services" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Judul</th>
                                <th>Konten</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rowPorto as $key => $row): ?>
                                <tr>
                                    <td><?php echo $key += 1; ?></td>
                                    <td>
                                        <img src="uploads/services/<?php echo $row['image'] ?>" alt="" width="250px">
                                    </td>
                                    <td><?php echo (isset($row['title'])) ? $row['title'] : '' ?></td>
                                    <td><?php echo (isset($row['description'])) ? $row['description'] : '' ?></td>
                                    <td><?php echo (isset($row['is_active'])) ? ($row['is_active'] == 1 ? 'published' : 'drafted') : '' ?></td>
                                    <td>
                                        <a href="?page=tambah-services&edit=<?php echo $row['id'] ?>" class="btn btn-success">
                                            Edit
                                        </a>
                                        <a
                                            onclick="return confirm('Apakah anda yakin ingin mneghapus data?')"
                                            href="?page=tambah-services&delete=<?php echo $row['id'] ?>"
                                            class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
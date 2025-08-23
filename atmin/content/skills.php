<?php
$querySkills = mysqli_query($connection, "SELECT * FROM skills ORDER BY id DESC");
$rowSkills = mysqli_fetch_all($querySkills, MYSQLI_ASSOC);
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12 px-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Skills Content</h5>

                    <div class="mb-3" align="right">
                        <a href="?page=tambah-skills" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Konten</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rowSkills as $key => $row): ?>
                                    <tr>
                                        <td><?php echo $key += 1; ?></td>
                                        <td><?php echo $row['title'] ?? '' ?></td>
                                        <td><?php echo $row['description'] ?? '' ?></td>
                                        <td><?php echo $row['percentage'] . "%" ?? '' ?></td>
                                        <td>
                                            <a href="?page=tambah-skills&edit=<?php echo $row['id'] ?>" class="btn btn-success m-1">
                                                Edit
                                            </a>
                                            <a
                                                onclick="return confirm('Apakah anda yakin ingin mneghapus data?')"
                                                href="?page=tambah-skills&delete=<?php echo $row['id'] ?>"
                                                class="btn btn-danger m-1">
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
    </div>
</section>
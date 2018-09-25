<?php include 'includes/header.php'; ?>

        <!-- Navigation -->
        <?php include 'includes/navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Vrsta servisa
                        </h1>

                        <div class="col-xs-12 col-sm-12 col-md-5">

                            <?php createVrstaServisa(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="vrsta_servisa"> Vrsta servisa</label>
                                    <input class="form-control" type="text" name="vrsta_servisa">
                                </div>
                                <div class="form-group">
                                    <label for="napomena"> Napomena</label>
                                    <input class="form-control" type="text" name="napomena">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Dodaj">
                                </div>
                            </form>

                            <?php updateVrstaServisa(); ?>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-7">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Šifra</th>
                                    <th class="text-center">Vrsta servisa</th>
                                    <th class="text-center">Napomena</th>
                                    <th class="text-center">Akcija</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php readVrstaServisa(); ?>

                                <?php deleteVrstaServisa(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>

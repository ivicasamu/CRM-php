<?php include 'includes/header.php'; ?>

        <!-- Navigation -->
        <?php include 'includes/navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Vrsta garancije
                        </h1>

                        <div class="col-xs-12 col-sm-12 col-md-5">

                            <?php createVrstaGarancije(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="vrsta_opreme"> Vrsta garancije</label>
                                    <input class="form-control" type="text" name="vrsta_garancije">
                                </div>
                                <div class="form-group">
                                    <label for="trajanje_garancije"> Trajanje garancije</label>
                                    <input class="form-control" type="text" name="trajanje_garancije">
                                </div>
                                <div class="form-group">
                                    <label for="napomena"> Napomena</label>
                                    <input class="form-control" type="text" name="napomena">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Dodaj">
                                </div>
                            </form>

                            <?php updateVrstaGarancije(); ?>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-7">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Šifra</th>
                                        <th class="text-center">Vrsta garancije</th>
                                        <th class="text-center">Trajanje garancije</th>
                                        <th class="text-center">Napomena</th>
                                        <th class="text-center">Akcija</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php readVrstaGarancije(); ?>

                                <?php deleteVrstaGarancije(); ?>
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

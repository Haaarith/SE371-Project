<div id="wrapper">
    <!-- Admin navigation -->
    <?php #INCLUDE ADMIN NAV HERE ?>

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header">
                        Welcome to Admins
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">
                        <?php insertCategory(); ?>
                        <form action="" method="post">

                            <div class="form=group">
                                <label for="cat_title">Add category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input type="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>

                        </form>

                        <?php
                            if(isset($_GET('edit'))){
                                include "includes/update_categories.php";
                            }
                        ?>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Category Title</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php displayAllCategories();?>
                                <?php if(isset($_GET['delete'])) {deleteCategory();} ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
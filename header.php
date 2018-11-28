<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/sacdep">Sắc Đẹp</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="gioithieu.php">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lienhe.php">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" id="txtSearch" class="form-control" placeholder="Search">
                    </div>
                    <button type="button" id="btnSearch" class="btn btn-default">Tìm kiếm</button>
                </form>

                <ul class="nav navbar-nav pull-right">
                    <?php
                        if(isset($_SESSION['user_name'])){
                            if(isset($_SESSION['id_group']) == true){
                                $id_group = $_SESSION['id_group'];
                                if($id_group == '1'){
                                    ?>
                                    <li>
                                        <a href="admin/index.php"><i class="fa fa-database"></i> Quản Trị</a>
                                    </li>
                                    <?php
                                } 
                            }if(isset($_SESSION['user_name'])){
                                ?>
                                <li>
                                    <a>
                                        <span class ="glyphicon glyphicon-user"></span>
                                        <?=$_SESSION['user_name']?>
                                    </a>
                                </li>

                                <li>
                                    <a href="dangxuat.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                </li>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <li>
                                    <a href="dangky.php"><i class="fa fa-registered"></i> Đăng ký</a>
                                </li>
                                <li>
                                    <a href="dangnhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                                </li>
                            <?php
                        }
                    ?> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
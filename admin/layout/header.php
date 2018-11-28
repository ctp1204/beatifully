
            <!-- Brand and toggle get grouped for better mobile display -->
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
                            <a class="navbar-brand" href="../admin/index.php"><p><i class="fa fa-bank"></i> Trang Quản Trị</p></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="gioithieu.html">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="lienhe.html">Liên hệ</a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav pull-right">
                                <?php
                                    if(isset($_SESSION['user_name'])){
                                        ?>
                                        <li>
                                            <a>
                                                <span class ="glyphicon glyphicon-user"></span>
                                                <?=$_SESSION['user_name']?>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="admindangxuat.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
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
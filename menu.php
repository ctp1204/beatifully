<!-- menu -->
<!--     <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Menu
                    </li>
                    <?php
                        foreach ($menu as $mn) {
                            ?>
                            <li href="#" class="list-group-item menu1">
                                <?=$mn->Ten?>
                            </li>
                            <ul>
                                <?php
                                    $loaitin = explode(',', $mn->LOAITIN);
                                    //print_r($loaitin);
                                    foreach ($loaitin as $loai) {
                                        list($id,$ten,$tenkhongdau)=explode(':', $loai);
                                        ?>
                                        <li class="list-group-item">
                                            <a href="loaitin.php?alias=<?=$tenkhongdau?>&id_loai=<?=$id?>"><?=$ten?></a>
                                        <?php
                                    }
                                ?>
                            </ul>    
                            <?php
                        }
                    ?>
                    

                </ul>
    </div> -->
    <div class="col-md-3 ">
        <div class="list-group">
          <?php
                        foreach ($menu as $mn) {
                            ?>
                            <li href="#" class="list-group-item active">
                                <?=$mn->Ten?>
                            </li>
                            <ul>
                                <?php
                                    $loaitin = explode(',', $mn->LOAITIN);
                                    //print_r($loaitin);
                                    foreach ($loaitin as $loai) {
                                        list($id,$ten,$tenkhongdau)=explode(':', $loai);
                                        ?>
                                        <li class="list-group-item">
                                            <a href="loaitin.php?alias=<?=$tenkhongdau?>&id_loai=<?=$id?>"><?=$ten?></a>
                                        <?php
                                    }
                                ?>
                            </ul>    
                            <?php
                        }
                    ?>
        </div>
    </div>
<!-- end menu -->
            <div class="row">
                <div class="col-lg-12">
                   <h3 class="page-header"><strong>Input Data Absensi Tanggal : <?php 
                   if($_GET['tanggal']<10){ $rw="0$_GET[tanggal]";}else{ $rw="$_GET[tanggal]"; }
                   if($_GET['bulan']<10){ $rc="0$_GET[bulan]";}else{ $rc="$_GET[bulan]";}
                   $dt=$rw."-".$rc."-".$_GET['tahun']; 
                   echo $dt;
                   ?> </strong></h3>
               </div>
               <!-- /.col-lg-12 -->
           </div>
           <!-- /.row -->
           <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Siswa <?php 
                        $sqlj=mysql_query("select * from kelas where idk='$_SESSION[idk]'");
                        $rsj=mysql_fetch_array($sqlj);

                        echo "Kelas $rsj[nama]";
                        $klas=$_GET['kls'];
                        $rg=10;
                        ?>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php 
                            echo "$dt";
                            ?>    
                            <form method="post" role="form" action="././module/simpan.php?act=input_absen&jam=<?php echo $_GET['jam'] ?>&klas=<?php echo $klas ?>&tgl=<?php echo"$dt"; ?>">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">No Telepon</th>
                                            <th class="text-center">Keterangan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        $tg=date("d-m-Y");
                                        $sql=mysql_query("select * from siswa where idk='$_GET[kls]'");
                                        while($rs=mysql_fetch_array($sql)){
                                           $sqla=mysql_query("select * from absen where ids='$rs[ids]' and tgl='$dt'");
                                           $rsa=mysql_fetch_array($sqla);
                                           $conk=mysql_num_rows($sqla);
                                           $sqlw=mysql_query("select * from kelas where idk='$rs[idk]'");
                                           $rsw=mysql_fetch_array($sqlw);
                                           $sqlb=mysql_query("select * from sekolah where id='$rsw[id]'");
                                           $rsb=mysql_fetch_array($sqlb);

                                           ?>                                        <tr class="odd gradeX">
                                            <td><?php echo"$rs[nis]";  ?></td>
                                            <td><?php echo"$rs[nama]";  ?></td>
                                            <?php
                                            if($rs['jk']=="L"){
                                                ?>
                                                <td class="text-center">Laki - Laki</td>
                                                <?php
                                            }else{
                                                ?>
                                                <td class="text-center" >Perempuan</td>
                                                <?php
                                            }
                                            ?>

                                            <td><?php echo"$rs[alamat]";  ?></td>
                                            <td><?php echo"$rs[tlp]";  ?></td>
                                            <td class="text-center">
                                                <div class="form-group">

                                                    <?php  
                                                    if($conk==0){
                                                        ?>                                            
                                                        <label class="radio-inline">
                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" checked >H
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="I">I
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="S">S
                                                        </label>





                                                        <?php } ?>

                                                        <?php  
                                                        if($rsa['ket']=="A"){
                                                            ?>                                            
                                                            <label class="radio-inline">
                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A" checked >A
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I">I
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S">S
                                                            </label>

                                                            <label class="radio-inline">
                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >H
                                                            </label>


                                                            <?php } ?>
                                                            <?php
                                                            if($rsa['ket']=="I"){
                                                                ?>                                            
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" checked>I
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="<?php echo $rs['ids'] ?>" value="S">S
                                                                </label>

                                                                <label class="radio-inline">
                                                                    <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >H
                                                                </label>


                                                                <?php } ?>
                                                                <?php
                                                                if($rsa['ket']=="S"){
                                                                    ?>                                            
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" >I
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="<?php echo $rs['ids'] ?>" value="S" checked>S
                                                                    </label>

                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >H
                                                                    </label>



                                                                    <?php } ?>
                                                                    <?php
                                                                    if($rsa['ket']=="M"){
                                                                        ?>                                            
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" >I
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="S" >S
                                                                        </label>

                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" checked>H
                                                                        </label>



                                                                        <?php } ?>
                                                                        <?php
                                                                        if($rsa['ket']=="N"){
                                                                            ?>                                            
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" >I
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S" >S
                                                                            </label>

                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >H
                                                                            </label>

                                                                       


                                                                            <?php } ?>


                                                                        </div>

                                                                    </td>

                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <button type="submit" class="btn btn-success">SImpan Data</button>

                                                </form>
                                            </div>
                                            <!-- /.table-responsive -->
                                            <br>
                                            <div class="well">
                                                <h4>Keterangan Absensi</h4>
                                                <p>A = Tidak Masuk Tanpa Keterangan</p>
                                                <p>I = Tidak Masuk Ada Surat Ijin Atau Pemberitahuan</p>
                                                <p>S = Tidak Masuk Ada Surat Dokter Atau Pemberitahuan</p>
                                                <p>H = Hadir</p>

                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->

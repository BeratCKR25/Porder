<?php include 'head.php';
include "fonksiyon.php";
if(!uyeCek()){
    header("location:index.php");
    exit;
}



?>
<body>
<!-- HEADER-ON -->
<?php include "include/header.php";
if (isset($_POST['basvur'])) {
    $kulMail=$kullanicicek['kullanici_mail'];
    $kulAdSoyad=$kullanicicek['ad'].' '.$kullanicicek['soyad'];
    $kulTel=$kullanicicek['tel'];
    $kulId=$kullanicicek['kullanici_id'];
    $skype=$_POST['skype'];
    $server=$_POST['server'];
    $guvenlik=$_POST['security'];
    $logo=$_POST['logo'];
    $beta=$_POST['beta'];
    $official=$_POST['official'];
    $epinHow=$_POST['epinhow'];
    $fiyat=$_POST['fiyat'];
    $epin=$_POST['epin'];

    $sql=$db->query("INSERT INTO `tedarikbasvuru`( `adsoyad`,`kulId`, `tel`, `skype`, `server`, `guvenlik`, `logo`, `beta`, `official`, `uyeMail`, `epinHow`, `fiyat`, `epin`) VALUES ('$kulAdSoyad','$kulId','$kulTel','$skype','$server','$guvenlik','$logo','$beta','$official','$kulMail','$epinHow','$fiyat','$epin')");
    Header("Location:?basvuru=ok");
}


$currentleft='tedarikbasvuru';



?>

<!-- MOBIL-MENU-ON -->
<?php include( "./include/mobilmenu.php");?>

<!-- MENU-ON -->
<?php include( "./include/menu.php");?>

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v3">
    <div class="section-headline">
        <h2>Kullanıcı Paneli</h2>
        <p>Anasayfa<span class="separator">/</span><span class="current-section">Kullanıcı Paneli</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
    <div class="section full">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item author-bio">
                <?php include "user-side.php"; ?>
                <!-- DROPDOWN -->
                <?php include( "./include/left-menu-panel.php" );?>
                <!-- /DROPDOWN -->
            </div>
            <!-- /SIDEBAR ITEM -->
        </div>
        <!-- /SIDEBAR -->

        <!-- CONTENT -->
        <div class="content">
            <!-- POST -->

            <!-- /POST -->
        </div>
        <!-- CONTENT -->

        <!-- CONTENT -->
        <div class="content">
            <div class="headline gold">
                <h4>Tedarikçi Başvuru Formu </h4><a href="basvurularim"><button  style="width: 40%; float: right;" class="button secondary"> BAŞVURULARIM </button></a>
            </div>
            <?php
            $kuLID=$kullanicicek['kullanici_id'];
            $sel=$db->query("SELECT * FROM `tedarikbasvuru` WHERE kulId='$kuLID' and durum='0'");
            $tdCek=$sel->fetch(PDO::FETCH_ASSOC);
            $sayTd=$sel->rowCount();


            if ($sayTd>0) { ?>

                <article class="post" style="padding:15px 15px 15px">
                    <div class="duyuru-border">
                        <h3><p class="text-header tertiary" style="margin-bottom:10px; margin-top:10px;">UYARI !!!</p></h3>
                        <p style="font-size:0.875em;line-height:24px; margin-bottom:10px; text-align:center;">
                            Mevcutta Onay Bekleyen Başvurunuz var !
                            </p>
                        <p style="font-size:0.875em;line-height:24px; margin-bottom:10px; text-align:center;">Başvurunuz incelendikten sonra tekrardan başvuru yapabilirsiniz.</p>
                        <a href="basvurularim" class="button primary" style="margin-left:auto; margin-right:auto; width:50%; margin-bottom:10px;"><span class="fa fa-check edit3"></span>BAŞVURULARIM </a>
                    </div>
                    <div class="clearfix"></div>
                </article>
            <?php } else { ?>
            <!-- FORM BOX ITEM -->
            <div class="form-box-item">
<form action="" method="POST">
                <!-- INPUT CONTAINER -->
                <div class="input-container half">
                    <label for="acc_name" class="rl-label required">İsim Soyisim ( Değiştirilemez ) </label>
                    <input type="text" id="acc_name" style="background-color: rgb(235, 235, 228);" name="adsoyad" value="<?php echo $kullanicicek['ad'].' '.$kullanicicek['soyad'] ?>" readonly="">
                </div>
                <div class="input-container half">
                    <label for="acc_name" class="rl-label required">Telefon Numarası ( Değiştirilemez ) </label>
                    <input type="text" id="acc_name" style="background-color: rgb(235, 235, 228);" name="tel" value="<?php echo $kullanicicek['tel'] ?>" readonly="">
                </div>
                <!-- /INPUT CONTAINER -->

                <!-- INPUT CONTAINER -->

                <!-- /INPUT CONTAINER -->

                <div class="clearfix"></div>

                <!-- INPUT CONTAINER -->
                <div class="input-container half">
                    <label  class="rl-label required">Skype Adresiniz  </label>
                    <input type="text" required="" name="skype" placeholder="Skype Adresinizi yazınız">
                </div>
                <!-- /INPUT CONTAINER -->

                <!-- INPUT CONTAINER -->
                <div class="input-container half">
                    <label  class="rl-label required">Server Adı </label>
                    <input type="text" required="" name="server" placeholder="Serverinizin adını yazınız">
                </div>
                <!-- /INPUT CONTAINER -->

                <div class="clearfix"></div>
                <div class="input-container half">
                    <label  class="rl-label required">Güvenlik Sistemi (Anti Cheat) </label>
                    <input type="text" required="" name="security" placeholder="Güvenlik sisteminizi yazınız">
                </div>
                <div class="input-container half">
                    <label  class="rl-label required">Server Logonuz (HizliResim.com) </label>
                    <input type="text" required="" name="logo" placeholder="HizliResim.com linkini yazınız">
                </div>
                <div class="clearfix"></div>
                <div class="input-container half">
                    <label  class="rl-label required">Server Beta Tarihi </label>
                    <input type="text" required="" name="beta" placeholder="Beta Açılış Tarihi. Örn : 19.08.2019">
                </div>
                <div class="input-container half">
                    <label  class="rl-label required">Server Official Tarihi </label>
                    <input type="text" required="" name="official" placeholder="Official Açılış Tarihi. Örn : 19.08.2019">
                </div>
                <div class="clearfix"></div>
                <div class="input-container half">
                    <label  class="rl-label required">Kazancın Aktarılacağı Üyelik E-Postası </label>
                    <input type="text" required="" id="acc_name" style="background-color: rgb(235, 235, 228);" name="mail" value="<?php echo $kullanicicek['kullanici_mail'] ?>" readonly="">
                </div>
                <div class="input-container half">
                    <label  class="rl-label required">Epinler Nasıl Yükleniyor ? </label>
                    <input type="text" required="" name="epinhow" placeholder="Panelden, PUS'tan vs.">
                </div>
                <div class="input-container">
                    <label for="item_description" class="rl-label required">Ürünler ve Fiyatları (<a style="color: red">Her bir seçeneğe KC Miktarını ve Fiyatını giriniz.</a>) </label>
                    <textarea id="item_description" required="" name="fiyat" placeholder="Alt satıra geçmek için ENTER tuşunu kullanabilirsiniz
Örneğin;
1000 KC - 10 TL
2000 KC - 20 TL
3000 KC - 30 TL"></textarea>
                </div>
                <!-- INPUT CONTAINER -->

                <!-- /INPUT CONTAINER -->

                <!-- INPUT CONTAINER -->

                <!-- /INPUT CONTAINER -->

                <div class="clearfix"></div>
                <div class="input-container">
                    <label for="item_description" class="rl-label required">E-Pinler (<a style="color: red">Epin gönderilenmeyen başvurular listelenmeyecektir.</a>) </label>
                    <textarea id="item_description" required="" name="epin" placeholder="Alt satıra geçmek için ENTER tuşunu kullanabilirsiniz
Örneğin;
ABCD-1234-EFGH-5678
DCBA-4321-HGFE-8765"></textarea>
                </div>
                <!-- INPUT CONTAINER -->

                <!-- /INPUT CONTAINER -->

                <!-- PROFILE IMAGE UPLOAD -->

                <!-- PROFILE IMAGE UPLOAD -->

    <center><button name="basvur" style="width: 50%;" class="button primary"> BAŞVURUYU GÖNDER </button></center>
</form>

            </div>
            <!-- /FORM BOX ITEM -->
        </div>
        <?php } ?>

                <!-- /TRANSACTION LIST ITEM -->

                <!-- TRANSACTION LIST ITEM -->





            </div>
            <!-- DASHBOARD CONTENT -->
        </div></div>
        <!-- CONTENT -->
    </div>
    <!-- /SECTION -->

    <!-- HIZMETLER -->
    <?php include( "./include/hizmetler.php" );?>
    <!-- /HIZMETLER -->

    <!-- FOOTER -->
    <?php include( "./include/footer.php" );?>
    <!-- /FOOTER -->

    <div class="shadow-film closed"></div>

    <!-- SVG ARROW -->
    <svg style="display: none;">
        <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
            <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
        </symbol>
    </svg>
    <!-- /SVG ARROW -->

    <!-- SVG STAR -->
    <svg style="display: none;">
        <symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
            <polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
        </symbol>
    </svg>
    <!-- /SVG STAR -->

    <!-- SVG PLUS -->
    <svg style="display: none;">
        <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
            <rect x="5" width="3" height="13"/>
            <rect y="5" width="13" height="3"/>
        </symbol>
    </svg>
    <!-- /SVG PLUS -->

    <!-- jQuery -->
    <script src="js/vendor/jquery-3.1.0.min.js"></script>
    <!-- Tooltipster -->
    <script src="js/vendor/jquery.tooltipster.min.js"></script>
    <!-- Owl Carousel -->
    <script src="js/vendor/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="js/popup-data.js"></script>
    <!-- Alert-Data -->
    <script src="js/vendor/jquery.xmalert.min.js"></script>
    <script src="js/oyunlar-alert-data.js"></script>
    <!-- Social -->
    <script src="js/sosyal-api.js"></script>
    <script src="js/sosyal-data.js"></script>
    <!-- Side Menu -->
    <script src="js/side-menu.js"></script>
    <!-- Tooltip -->
    <script src="js/tooltip.js"></script>
    <!-- User Quickview Dropdown -->
    <script src="js/user-board.js"></script>
    <?php if (@$_GET['basvuru']=="ok") { ?>
    <script>
        $('body').xmalert({
            x: 'right',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageSuccess',
            title: 'Onay Mesajı',
            paragraph: 'Başvurunuz başarıyla tarafımıza ulaşmıştır.',
        });
    </script>
    <?php } ?>
</body>
</html>
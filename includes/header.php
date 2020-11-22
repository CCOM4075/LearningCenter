<!--Header Descktop-->
<?php
    $name = getUserName($_SESSION['id_usuario']);
    $userName = getUserUsuario($_SESSION['id_usuario']);   
?>
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/icon/LC_icon175x55.png" alt="LC Logo" />
                    </a>
                </div>
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Buscar datos y reportes..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                
                <div class="header-button">

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="images/icon/avatar-01.jpg"/>
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php if(!empty($_SESSION['active']))echo $name;?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="images/icon/avatar-01.jpg"/>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php if(!empty($_SESSION['active']))echo $name;?></a>
                                        </h5>
                                        <span class="email"><?php if(!empty($_SESSION['active']))echo $userName;?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Cuenta</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Configuración</a>
                                    </div>
                                    <!--
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                    -->
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="signout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</header>
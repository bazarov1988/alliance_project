<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo \yii\helpers\Url::toRoute('/user/admin')?>"><i class="fa fa-users fa-fw"></i> <?php echo Yii::t('app','Users');?></a>
            </li>
	        <li>
		        <a href="<?php echo \yii\helpers\Url::toRoute('/locations/index')?>"><i class="fa fa-globe fa-fw"></i> <?php echo Yii::t('app','Occupancies');?></a>
	        </li>
            <li class="active">
                <a href="#"><i class="fa fa-edit fa-fw"></i> <?php echo Yii::t('app','Quotes');?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/quotes/unfinished">Unfinished Quotes</a>
                    </li>
                    <li>
                        <a href="/quotes/finished">Finished Quotes</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
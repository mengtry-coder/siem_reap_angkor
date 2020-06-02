<?php
use yii\widgets\ListView;
use common\models\GlobalFunction;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Dashboard | eO-BMS';
$create_proposal = URL::toRoute(['proposal/create']);
// echo $_SESSION['company_id'];
?> 

<div class="col-md-12" style="margin-bottom: 30px;">
    <div class="col-sm-6 bord-rgtx" style="border: 10px solid #f5f8fa;">
        <div class="panel text-center">
            <div class="panel-heading">
                <div class="row">
                    <span class="panel-title">this month progress</span>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group text-left pad-ver">
                            <li class="list-group-item">
                                <div class="pull-right"><span class="text-semibold"><?=$actual_sale_monthly;?>$</span></div>
                                <span class="text-semibold">Actual</span>
                            </li>
                            <li class="list-group-item">
                                <div class="pull-right"><span class="text-semibold"><?=$target_sale_monthly;?>$</span></div>
                                <span class="text-semibold">Goal</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div id="this_month-progressing-pie" class="demo-pie pie-title-center" data-percent="0.00%">
                            <div class="wrap_circle">
                                <?php
                                    $percentage_monthly = GlobalFunction::calculateProgress($actual_sale_monthly, $target_sale_monthly); 

                                    $percentage_monthly = round($percentage_monthly);
                                ?>
                                <!---------------New circle progress------------------->
                                <div class="wrap_chart">
                                    <div class="box">
                                        <div class="chart_month" data-percent="<?=$percentage_monthly?>">
                                            <span style="font-size: 26px;">
                                                <?=$percentage_monthly;?>%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!---------------End new circle progress------------------->
                                
                            </div>
                        
                            <canvas height="300" width="300" style="height: 150px; width: 150px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6" style="border: 10px solid #f5f8fa;">
        <div class="panel text-center">
            <div class="panel-heading">
                <div class="row">
                    <span class="panel-title">this year progress</span>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group text-left pad-ver">
                            <li class="list-group-item">
                                <div class="pull-right"><span class="text-semibold"><?=$actual_sale_yearly;?>$</span></div>
                                <span class="text-semibold">Actual</span>
                            </li>
                            <li class="list-group-item">
                                <div class="pull-right"><span class="text-semibold"><?=$target_sale_yearly;?>$</span></div>
                                <span class="text-semibold">Goal</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div id="this_year-progressing-pie" class="demo-pie pie-title-center" data-percent="0.00%">
                            <!-- <span class="pie-value text-thin text-2x">0.00%</span> -->
                            <div class="wrap_circle">
                                <?php
                                    $percentage_yearly = GlobalFunction::calculateProgress($actual_sale_yearly, $target_sale_yearly); 

                                    $percentage_yearly = round($percentage_yearly);
                                ?>
                                <!---------------New circle progress------------------->
                                <div class="wrap_chart">
                                    <div class="box">
                                        <div class="chart_year" data-percent="<?=$percentage_yearly?>">
                                            <span style="font-size: 26px;">
                                                <?=$percentage_yearly;?>%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!---------------End new circle progress------------------->

                            </div>

                        <canvas height="300" width="300" style="height: 150px; width: 150px;"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-4">
        <a href="<?= Url::toRoute(['proposal/index']) ?>">
            <h3 class="panel-title">PROPOSAL</h3>
        </a>    
      
        <button data-target="#demo-default-modal" data-toggle="modal" class="add_new" id="modalButton" value="<?= Url::toRoute(['proposal/create']) ?>">                           
         Add New 
        </button> 
        <hr>
        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-main text-md text-semibold">DRAFT <span class="pull-right"><?=$proposal_month_status_1;?> / <?=$proposal_total_status_1;?></span></p>
                <div class="progress progress-md">
                    <div style="width: <?= GlobalFunction::calculateProgress($proposal_month_status_1, $proposal_total_status_1); ?>%;" class="progress-bar progress-bar-default">
                    <?= GlobalFunction::calculateProgress($proposal_month_status_1, $proposal_total_status_1); ?> %
                    </div>
                </div>
                <p class="text-main text-sm top_summary_report"><span class="pull-right"> This Month / Total</span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-info text-md text-semibold">SENT <span class="pull-right"><?=$proposal_month_status_2;?> / <?=$proposal_total_status_2;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($proposal_month_status_2, $proposal_total_status_2); ?>%;" class="progress-bar progress-bar-info">
                    <?= GlobalFunction::calculateProgress($proposal_month_status_2, $proposal_total_status_2); ?> %
                </div></div>
                <p class="text-info text-sm top_summary_report"><span class="pull-right">This Month / Total</span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-warning text-md text-semibold">EXPIRED <span class="pull-right"><?=$proposal_month_status_4;?> / <?=$proposal_total_status_4;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($proposal_month_status_4, $proposal_total_status_4); ?>%;" class="progress-bar progress-bar-warning">
                    <?= GlobalFunction::calculateProgress($proposal_month_status_4, $proposal_total_status_4); ?> %
                </div></div>
                <p class="text-warning text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-danger text-md text-semibold">DECLINED <span class="pull-right"><?=$proposal_month_status_5;?> / <?=$proposal_total_status_5;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($proposal_month_status_5, $proposal_total_status_5); ?>%;" class="progress-bar progress-bar-danger">
                    <?= GlobalFunction::calculateProgress($proposal_month_status_5, $proposal_total_status_5); ?> %
                </div></div>
                <p class="text-danger text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-success text-md text-semibold">ACCEPTED <span class="pull-right"><?=$proposal_month_status_6;?> / <?=$proposal_total_status_6;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($proposal_month_status_6, $proposal_total_status_6); ?>%;" class="progress-bar progress-bar-success">
                    <?= GlobalFunction::calculateProgress($proposal_month_status_6, $proposal_total_status_6); ?> %
                </div></div>
                <p class="text-success text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="<?= Url::toRoute(['quotation/index']) ?>">
            <h3 class="panel-title">QUOTATION</h3>
        </a>    
        <button data-target="#demo-default-modal" data-toggle="modal" class="add_new" id="modalButton" value="<?= Url::toRoute(['quotation/create']) ?>">                           
         Add New 
        </button> 
        <hr>
        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-main text-md text-semibold">DRAFT <span class="pull-right"><?=$quotation_month_status_1;?> / <?=$quotation_total_status_1;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($quotation_month_status_1, $quotation_total_status_1); ?>%;" class="progress-bar progress-bar-default">
                    <?= GlobalFunction::calculateProgress($quotation_month_status_1, $quotation_total_status_1); ?> %
                </div></div>
                <p class="text-main text-sm top_summary_report"><span class="pull-right"> This Month / Total</span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-info text-md text-semibold">SENT <span class="pull-right"><?=$quotation_month_status_2;?> / <?=$quotation_total_status_2;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($quotation_month_status_2, $quotation_total_status_2); ?>%;" class="progress-bar progress-bar-info">
                    <?= GlobalFunction::calculateProgress($quotation_month_status_2, $quotation_total_status_2); ?> %
                </div></div>
                <p class="text-info text-sm top_summary_report"><span class="pull-right">This Month / Total</span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-warning text-md text-semibold">EXPIRED <span class="pull-right"><?=$quotation_month_status_4;?> / <?=$quotation_total_status_4;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($quotation_month_status_4, $quotation_total_status_4); ?>%;" class="progress-bar progress-bar-warning">
                    <?= GlobalFunction::calculateProgress($quotation_month_status_4, $quotation_total_status_4); ?> %
                </div></div>
                <p class="text-warning text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-danger text-md text-semibold">DECLINED <span class="pull-right"><?=$quotation_month_status_5;?> / <?=$quotation_total_status_5;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($quotation_month_status_5, $quotation_total_status_5); ?>%;" class="progress-bar progress-bar-danger">
                    <?= GlobalFunction::calculateProgress($quotation_month_status_5, $quotation_total_status_5); ?> %
                </div></div>
                <p class="text-danger text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-success text-md text-semibold">ACCEPTED <span class="pull-right"><?=$quotation_month_status_6;?> / <?=$quotation_total_status_6;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($quotation_month_status_6, $quotation_total_status_6); ?>%;" class="progress-bar progress-bar-success">
                    <?= GlobalFunction::calculateProgress($quotation_month_status_6, $quotation_total_status_6); ?> %
                </div></div>
                <p class="text-success text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="<?= Url::toRoute(['contract/index']) ?>">
            <h3 class="panel-title">CONTRACT</h3>
        </a>    
        <button data-target="#demo-default-modal" data-toggle="modal" class="add_new" id="modalButton" value="<?= Url::toRoute(['contract/create']) ?>">                           
         Add New 
        </button> 
        <hr>
        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-main text-md text-semibold">DRAFT<span class="pull-right"><?=$contract_month_status_1;?> / <?=$contract_total_status_1;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($contract_month_status_1, $contract_total_status_1); ?>%;" class="progress-bar progress-bar-default">
                    <?= GlobalFunction::calculateProgress($contract_month_status_1, $contract_total_status_1); ?> %
                </div></div>
                <p class="text-main text-sm top_summary_report"><span class="pull-right"> This Month / Total</span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-info text-md text-semibold">SENT <span class="pull-right"><?=$contract_month_status_2;?> / <?=$contract_total_status_2;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($contract_month_status_2, $contract_total_status_2); ?>%;" class="progress-bar progress-bar-info">
                    <?= GlobalFunction::calculateProgress($contract_month_status_2, $contract_total_status_2); ?> %
                </div></div>
                <p class="text-info text-sm top_summary_report"><span class="pull-right">This Month / Total</span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-warning text-md text-semibold">EXPIRED<span class="pull-right"><?=$contract_month_status_4;?> / <?=$contract_total_status_4;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($contract_month_status_4, $contract_total_status_4); ?>%;" class="progress-bar progress-bar-warning">
                    <?= GlobalFunction::calculateProgress($contract_month_status_4, $contract_total_status_4); ?> %
                </div></div>
                <p class="text-warning text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-danger text-md text-semibold">DECLINED<span class="pull-right"><?=$contract_month_status_5;?> / <?=$contract_total_status_5;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($contract_month_status_5, $contract_total_status_5); ?>%;" class="progress-bar progress-bar-danger">
                    <?= GlobalFunction::calculateProgress($contract_month_status_5, $contract_total_status_5); ?> %
                </div></div>
                <p class="text-danger text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>

        <div class="panel panel-bordered-mint">
            <div class="panel-body"> 
                <p class="text-success text-md text-semibold">ACCEPTED<span class="pull-right"><?=$contract_month_status_6;?> / <?=$contract_total_status_6;?></span></p>
                <div class="progress progress-md"><div style="width: <?= GlobalFunction::calculateProgress($contract_month_status_6, $contract_total_status_6); ?>%;" class="progress-bar progress-bar-success">
                    <?= GlobalFunction::calculateProgress($contract_month_status_6, $contract_total_status_6); ?> %
                </div></div>
                <p class="text-success text-sm top_summary_report"><span class="pull-right">This Month / Total<span></p>
            </div>
        </div>
    </div>                
</div> 

<style type="text/css">
    .add_new{
        cursor: pointer !important;
        position: absolute;
        top: 0px;
        right: 0px;
        background: none;
        color: #f05c11;
        border: none;
    }
    .panel-bordered-mint {
        border: none;
    }
    .panel-title {
        text-transform: uppercase;
    }
    span.text-semibold {
        font-weight: 400;
    }
    span.panel-title {
        text-align: center;
        width: 100%;
        font-size: 14px;
    }

/*------------New circle progress-------------*/
    .wrap_chart{
        /*width: 1000px;*/
        /*margin: 300px auto 0;*/
    }
    .wrap_chart .box{
        /*width: 25%;*/
        /*float: left;*/
        padding: 0;
    }
    .wrap_chart .box .chart_month,.chart_year{
        position: relative;
        width: 130px;
        height: 130px;
        margin: 0 auto;
        text-align: center;
        font-size: 30px;
        line-height: 130px;
    }
    .wrap_chart .box canvas{
        position: absolute;
        top: 0;
        left: 0;
    }

/*------------End new circle progress-------------*/

</style>
<?php
$script = <<< JS
    $(function() {
        $('.chart_month').easyPieChart({
            size: 130,
            barColor: '#f05c11d1',
            scaleColor: false,
            lineWidth: 7,
            // lineCap: 'square',
            // trackColor: '#646a71d4',
            animate: 2000,
        });
        $('.chart_year').easyPieChart({
            size: 130,
            barColor: '#5bc0de',
            scaleColor: false,
            lineWidth: 7,
            animate: 2000,
        });
    });
JS;
$this->registerJS($script);
?>

 
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\alert\Alert;

$js = <<< 'SCRIPT'
/* To initialize BS3 tooltips set this below */
$(function () {
    $("[data-toggle='tooltip']").tooltip();
});;
/* To initialize BS3 popovers set this below */
$(function () {
    $("[data-toggle='popover']").popover();
});
SCRIPT;
// Register tooltip/popover initialization javascript
$this->registerJs($js);
if (Yii::$app->session->hasFlash('su')) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => Yii::$app->session->getFlash('action'),
        'icon' => 'glyphicon glyphicon-ok',
        'body' => Yii::$app->session->getFlash('su'),
        'showSeparator' => false,
        'delay' => 3000
    ]);
}
//echo date('dHi') + 5;
//echo Yii::$app->session['timeout'];

?>
<?php
use hscstudio\chart\ChartNew;

?>
    <div class="box box-solid bg-teal-gradient">
        <div class="box-header">
            <i class="fa fa-th"></i>

            <h3 class="box-title">ສົມ​ທຽບລາຍ​ຈ່າຍເປັ​ນ​ອາ​ທິດ</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-footer no-border">
            <?php
            $type_ps = \app\models\TypePay::find()->orderBy('sort ASC')->all();
            $title = [];
            $data = [];
            foreach ($type_ps as $type_p) {
                $title[] = $type_p->name;
                if (Yii::$app->session['user']->user_type == "Admin") {
                    $data[] = Yii::$app->db->createCommand('SELECT sum(amount)  FROM payment LEFT JOIN user ON payment.user_id=user.id  where payment.date BETWEEN "' . date("Y-m-d", strtotime('monday this week')) . '" and "' . date("Y-m-d", strtotime('sunday this week')) . '"  and type_pay_id=' . $type_p->id . ' and user.user_role_id=' . Yii::$app->session['user']->user_role_id . '')->queryScalar();
                } else {
                    $data[] = Yii::$app->db->createCommand('SELECT sum(amount)  FROM payment where date BETWEEN "' . date("Y-m-d", strtotime('monday this week')) . '" and "' . date("Y-m-d", strtotime('sunday this week')) . '"  and type_pay_id=' . $type_p->id . '')->queryScalar();
                }
            }

            echo ChartNew::widget([
                'type' => 'bar', # pie, doughnut, line, bar, horizontalBar, radar, polar, stackedBar, polarArea
                'title' => 'PHP Framework',
                'width' => '300',
                'labels' => $title,
                'colors' => [
                    'soft' => ['#f44336'],
                ],
                'datasets' => [
                    ['title' => '2014', 'data' => $data],
                ],
            ]);

            ?>
        </div>
    </div>

    <div class="box box-solid bg-teal-gradient">
        <div class="box-header" style="background: #5ea7f4;">
            <i class="fa fa-th"></i>

            <h3 class="box-title">ສົມ​ທຽບລາຍ​ຈ່າຍເປັ​ນ​ເດືອນ</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm" data-widget="collapse" style="background: #569be5"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-sm" data-widget="remove" style="background: #569be5"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-footer no-border">
            <?php
            $type_ps = \app\models\TypePay::find()->orderBy('sort ASC')->all();
            $title = [];
            $data = [];
            foreach ($type_ps as $type_p) {
                $title[] = $type_p->name;
                if (Yii::$app->session['user']->user_type == "Admin") {
                    $data[] = Yii::$app->db->createCommand('SELECT sum(amount)  FROM payment LEFT JOIN user ON payment.user_id=user.id where month(payment.date)="' . date('m') . '" and type_pay_id=' . $type_p->id . ' and user.user_role_id=' . Yii::$app->session['user']->user_role_id . '')->queryScalar();
                } else {
                    $data[] = Yii::$app->db->createCommand('SELECT sum(amount)  FROM payment where month(date)="' . date('m') . '"  and type_pay_id=' . $type_p->id . ' ')->queryScalar();
                }
            }
            echo ChartNew::widget([
                'type' => 'bar', # pie, doughnut, line, bar, horizontalBar, radar, polar, stackedBar, polarArea
                'title' => 'PHP Framework',
                'width' => '300',
                'labels' => $title,
                'colors' => [
                    'soft' => ['#f44336'],
                ],
                'datasets' => [
                    ['title' => '2014', 'data' => $data],
                ],
            ]);

            ?>
        </div>
    </div>


    <div class="box box-solid bg-teal-gradient">
        <div class="box-header" style="background: #059e17;">
            <i class="fa fa-th"></i>

            <h3 class="box-title">ສົມ​ທຽບລາຍ​ຈ່າຍເປັ​ນ​ປີ</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm" data-widget="collapse" style="background: #039714"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-sm" data-widget="remove" style="background: #039714"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-footer no-border">
            <?php
            $type_ps = \app\models\TypePay::find()->orderBy('sort ASC')->all();
            $title = [];
            $data = [];
            foreach ($type_ps as $type_p) {
                $title[] = $type_p->name;
                if (Yii::$app->session['user']->user_type == "Admin") {
                    $data[] = Yii::$app->db->createCommand('SELECT sum(amount)  FROM payment LEFT JOIN user ON payment.user_id=user.id where year(payment.date)="' . date('Y') . '" and type_pay_id=' . $type_p->id . ' and user.user_role_id=' . Yii::$app->session['user']->user_role_id . '')->queryScalar();
                } else {
                    $data[] = Yii::$app->db->createCommand('SELECT sum(amount)  FROM payment where year(date)="' . date('Y') . '"  and type_pay_id=' . $type_p->id . ' ')->queryScalar();
                }
            }
            echo ChartNew::widget([
                'type' => 'bar', # pie, doughnut, line, bar, horizontalBar, radar, polar, stackedBar, polarArea
                'title' => 'PHP Framework',
                'width' => '300',
                'labels' => $title,
                'colors' => [
                    'soft' => ['#f44336'],
                    'hard' => ['#f44336'],
                ],
                'datasets' => [
                    ['title' => '2014', 'data' => $data],
                ],
            ]);

            ?>
        </div>
    </div>



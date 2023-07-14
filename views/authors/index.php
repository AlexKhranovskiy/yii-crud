<?php

use app\models\Author;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchAuthors $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var $authors */ ?>
        <?php foreach ($authors as $author): ?>
            <tr>
                <th scope="row"><?= Html::a($author->id, Url::toRoute(['/authors/view', 'id' => $author->id])) ?></th>
                <td><?= $author->name ?></td>
                <td><?= $author->email ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td>
                <?= Html::a('New', '/authors/create', ['class' => 'btn btn-primary btn-sm']) ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
<?php //$this->registerJsFile('@web/js/author.js')?>
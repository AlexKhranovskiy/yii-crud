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
    <!--<!-- Create Author Modal -->-->
    <!--<div class="modal fade" id="authorCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--    <div class="modal-dialog">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">-->
    <!--                <h5 class="modal-title" id="exampleModalLabel">Create new author</h5>-->
    <!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
    <!--            </div>-->
    <!--            <div class="modal-body">-->
    <!--                <form>-->
    <!--                    <div class="form-group row">-->
    <!--                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>-->
    <!--                        <div class="col-sm-10">-->
    <!--                            <input type="text" class="form-control form-control-sm" id="staticEmail" value="user@example.com">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-group row">-->
    <!--                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>-->
    <!--                        <div class="col-sm-10">-->
    <!--                            <input type="password" class="form-control form-control-sm" id="inputPassword" value="password">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--            <div class="modal-footer">-->
    <!--                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>-->
    <!--                <button type="button" class="btn btn-primary btn-sm">Save changes</button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
<?php $this->registerJsFile('@web/js/author.js')?>
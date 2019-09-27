<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Categories;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;
class CategoriesController extends AdminController
{   
    use ModelForm;
    public function index(Content $content)
    {
        return Admin::content(function (Content $content) {
            $content->header( __('栏目管理'));
            $content->body(Categories::tree());
        });
    }
    /**
     * Title for current resource.
     *
     * @var string
     */
  

    protected $title = '栏目管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Categories);

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('order', __('Order'));
        $grid->column('title', __('Title'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Categories::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('order', __('Order'));
        $show->field('title', __('Title'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Categories);

        $form->display('id', 'ID');
        $form->select('parent_id', __('categories.parent_id'))->options(Categories::selectOptions());
        $form->text('title', __('categories.title'))->rules('required');
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');
        return $form;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: tat-nda
 * Date: 3/6/19
 * Time: 7:29 AM
 */

namespace App\Http\View\Composers;


use App\Http\Controllers\Interfaces\PostsInterface;
use Illuminate\View\View;

class FooterComposer
{
    protected $repository;

    public function __construct(PostsInterface $repository)
    {
        $this->repository = $repository;
    }

    public function compose(View $view)
    {

    }
}

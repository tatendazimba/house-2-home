<?php
/**
 * Created by PhpStorm.
 * User: tat-nda
 * Date: 3/6/19
 * Time: 12:18 PM
 */

namespace App\Http\Controllers\Interfaces;


use App\Tag;

interface TagInterface
{
    public function index();
    public function all();
    public function popular();
    public function destroy(Tag $tag);
    public function store($request);
}

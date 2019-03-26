<?php
/**
 * Created by PhpStorm.
 * User: tat-nda
 * Date: 3/6/19
 * Time: 12:19 PM
 */

namespace App\Http\Controllers\Repositories;


use App\Http\Controllers\Interfaces\TagInterface;
use App\Tag;
use Illuminate\Http\Request;

class TagRepository implements TagInterface
{

    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        return $this->tag->orderBy("name", "asc")->paginate();
    }

    public function all()
    {
        return $this->tag->orderBy("name", "asc")->get();
    }

    public function popular()
    {
        return $this->tag->orderBy("id", "desc")->limit(5)->get();
    }

    public function destroy(Tag $tag)
    {
        return $tag->delete();
    }

    public function store($request)
    {
        $tag = new Tag();
        $tag->fill($request);
        return $tag->save();
    }
}

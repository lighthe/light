<?php namespace app\home\controller;

use hdphp\view\View;

class Entry  extends Common {

	public function index() {

        $artData = Db::table( 'article' )->paginate(3);
        foreach ( $artData as $f ) {
             $f['title'];
        }



//        p($artData);
//显示页码链接
        $page=$artData->links();
//        p($page);
        View::with('page',$page);

        View::with('artData',$artData);
		return view();
	}

}
<?php 
namespace App\Http\Controllers;
use App\Models\Bucket;
use Auth;

class BucketController extends Controller {

    public function viewBucket($id) {
        $bucket = new Bucket($id);
        return view('bucket', ['bucket' => $bucket]);
    }

    public function createBucket() {
        return view('new_bucket');
    }

    public function postCreate() {
        $bucket = new Bucket();
        $bucket->name = Request::input('name');
        $bucket->description = Request::input('description');
        $bucket->save();
        return redirect('User');
    }

    public function editBucket($id) {
        $bucket = new Bucket($id);
        return view('bucket_edit', ['bucket' => $bucket]);
    }

    public function postEdit($id) {
        $bucket = new Bucket($id);
        $bucket->name = Request::get('name');
        $bucket->description = Request::get('description');
        $bucket->save();
        return redirect('bucket/' . $id);
    }

    public function delete($id) {
        $bucket = new Bucket($id);
        $bucket->delete();
        return redirect('bucket');
    }

    // public function Bucket() {
    //     if (!auth::check()) {
    //         return redirect('auth/login');
    //     }
    //     return view('bucket');
    // }

    // public function create() {
    //     if (!auth::check()) {
    //         return redirect('auth/login');
    //     }
    //     return view('new_bucket');
    // }

    // public function edit() {
    //     if (!auth::check()) {
    //         return redirect('auth/login');
    //     }
    //     return view('edit_bucket');
    // }

}
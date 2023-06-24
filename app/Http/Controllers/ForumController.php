<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ForumController extends Controller
{
    public function index() {
        $response = Http::get(env('RESTSERVER_URL') . '/forum');
        $forums = $response->json();
         
        return view('forum', ['forums' => $forums]);
    }

    public function posts($forumId) {
        $response = Http::get(env('RESTSERVER_URL') . '/user/');
        $users = $this->usersArrayModification($response->json());

        $response = Http::get(env('RESTSERVER_URL') . '/forum/' . $forumId);
        $forum = $response->json();

        $response = Http::get(env('RESTSERVER_URL') . '/post/' . $forumId . '/forum');
        $posts = $response->json();
         
        return view('posts', ['users' => $users, 'forum' => $forum, 'posts' => $posts]);
    }

    private function usersArrayModification($users) {
        $finalUsers = [];

        foreach($users as $user) {
            $finalUsers[$user['id']] = $user['name'];
        }

        return $finalUsers;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function httpClient()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        if ($response) {
            return view('client.client', compact('response'));
        } else {
            return response()->json(['error' => 'Error'], 500);
        }

    }

    public function createClient()
    {
        return view('client.create');
    }

    public function storeClient(Request $request)
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' => $request->title,
            'body' => $request->body,
            'userId' => $request->useId,
        ]);
        return $response;
    }

    public function showClient($id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id)->json();
        if ($response) {
            return view('client.show', compact('response'));
            return $response;
        } else {
            return response()->json(['error' => 'Error'], 500);
        }
    }
    public function editClient($id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id)->json();
        return view('client.edit', compact('response'));
    }

    public function updateClient(Request $request)
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/' . $request->id, [
            'title' => $request->title,
            'body' => $request->body,
            'userId' => $request->userId,
        ]);
        return $response;
    }

    public function deleteClient($id)
    {
        $response = Http::delete("https://jsonplaceholder.typicode.com/posts/{$id}");

        if ($response->successful()) {
            return response()->json(['message' => 'Post deleted successfully']);
        } else {
            return response()->json(['error' => 'Unable to delete the post'], $response->status());
        }
    }

}

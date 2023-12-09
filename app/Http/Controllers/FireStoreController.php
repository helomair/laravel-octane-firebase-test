<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class FireStoreController extends Controller
{
    public function __construct(
        protected FirebaseService $firebaseService
    ){}
    public function store() {
        $data = [
            "id" => 'AAAA',
            "message" => "Hello, world"
        ];

        $this->firebaseService->firestoreUpdate('test', $data);
    }
}

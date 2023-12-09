<?php

namespace App\Services;

use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseService {
    protected $database;

    public function __construct() {
        $this->database = Firebase::firestore()->database();
    }

    public function firestoreUpdate(string $collection, array $data) {
        $documentRef = $this->database->collection($collection)->document($data['id']);
        $documentRef->set($data);
    }
}
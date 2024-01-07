<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    //
    public function backup()
    {
        // Run the backup command
        Artisan::call('backup:run');

        // Display a success message (optional)
        return redirect()->back()->with('success', 'Database backup completed successfully.');
    }
}

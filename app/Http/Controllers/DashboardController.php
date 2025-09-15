<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalMembers = Member::count();
        $activeLoans = Loan::where('returned', false)->count();
        $overdueLoans = Loan::where('returned', false)
            ->where('due_date', '<', now())
            ->count();
        
        $recentLoans = Loan::with(['book', 'member'])
            ->where('returned', false)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $popularBooks = Book::withCount('loans')
            ->orderBy('loans_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalBooks', 
            'totalMembers', 
            'activeLoans', 
            'overdueLoans',
            'recentLoans',
            'popularBooks'
        ));
    }
}
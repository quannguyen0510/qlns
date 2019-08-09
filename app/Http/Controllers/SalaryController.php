<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\SalaryRepository;
use Carbon\Carbon;

class SalaryController extends Controller
{
    public function dashboard()
    {
        return view('admin.salary.dashboard');
    }

    public function index()
    {
        return view('salary.index');
    }

    public function getMeSalary()
    {
        $id = Auth::user()->id;
        $result = app()
            ->make(SalaryRepository::class)
            ->getSalaryByYearMonth($id, Carbon::now()->month, Carbon::now()->year);
        return response()->json($result);
    }
}
?>

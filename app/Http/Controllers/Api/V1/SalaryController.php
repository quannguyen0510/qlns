<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\SalaryRepository;
use App\Http\Controllers\Controller;

class SalaryController extends Controller
{
    protected $salaryRepository;

    public function __construct(SalaryRepository $sr)
    {
        $this->salaryRepository = $sr;
    }

    public function checkpoint(Request $request)
    {
        $data = $request->only(['id','mode']);
        $result = $this->salaryRepository->checkpoint($data);
        return response()->json($result,200);
    }

    public function getTodaySalaries()
    {
        $result = $this->salaryRepository->getTodaySalaries();
        return response()->json($result,200);
    }
}
?>

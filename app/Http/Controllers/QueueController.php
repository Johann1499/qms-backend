<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QueueController extends Controller
{
    protected $maxQueueLimit = 300; // Define the maximum limit for the queue

    public function index(Request $request)
    {
        // Get the department from the query parameter
        $department = $request->query('department');

        // Fetch queue data based on the department filter
        $queues = $department 
            ? Queue::where('department', $department)->get() 
            : Queue::all();

        // Return the queue data as a JSON response
        return response()->json($queues);
    }

    public function filterQueue(Request $request)
{
    // Get the department from the query parameter
    $department = $request->query('department');

    // Check if the department is provided and fetch the queue data accordingly
    if ($department) {
        $queues = Queue::where('department', $department)->get();
    } else {
        return response()->json(['error' => 'Department parameter is required'], 400);
    }

    // Return the queue data as a JSON response
    return response()->json($queues);
}


public function store(Request $request)
{
    Log::info('Queue data received:', $request->all());

    // Validate the request data
    $request->validate([
        'name' => 'required|string',
        'student_number' => 'required|string|size:9|unique:queues',
        'department' => 'required|string',
        'queue_number' => 'required|string', // Ensure queue_number is provided and valid
    ]);

    $department = $request->department;
    $queueNumber = $request->queue_number;

    // Check if the queue limit has been reached for the department
    $currentCount = Queue::where('department', $department)->count();
    if ($currentCount >= $this->maxQueueLimit) {
        return response()->json(['error' => 'Queue limit reached for department: ' . $department], 300);
    }

    // Create and save the new Queue record
    $queue = new Queue([
        'name' => $request->name,
        'student_number' => $request->student_number,
        'department' => $department,
        'queue_number' => $queueNumber,
    ]);
    $queue->save();

    // Return the response confirming the data was stored
    return response()->json([
        'message' => 'Record stored successfully',
    ], 201);
    }


    
    public function getQueueCountByDepartment()
    {
    $counts = Queue::selectRaw('department, COUNT(*) as total')
                    ->groupBy('department')
                    ->get();

    return response()->json($counts);
    }


    
    public function destroy($id)
    {
        // Find the queue record by ID
        $queue = Queue::find($id);

        if (!$queue) {
            return response()->json(['message' => 'Queue record not found'], 404);
        }

        // Delete the queue record
        $queue->delete();

        return response()->json(['message' => 'Queue record deleted successfully']);
    }

    public function generateQueueNumberForRequest(Request $request)
    {
        // Get the department from the query parameter
        $department = $request->query('department');

        // Validate the department parameter
        if (!$department) {
            return response()->json(['error' => 'Department parameter is required'], 400);
        }

        // Check if the queue limit has been reached for the department
        $currentCount = Queue::where('department', $department)->count();
        if ($currentCount >= $this->maxQueueLimit) {
            return response()->json(['error' => 'Queue limit reached for department: ' . $department], 300);
        }

        // Generate the queue number
        $queueNumber = $this->generateQueueNumber($department);

        // Return the response with the generated queue number
        return response()->json([
            'queue_number' => $queueNumber,
        ]);
    }

    /**
     * Generate a new queue number based on the latest queue number in the database.
     *
     * @param string $department
     * @return string
     */
    protected function generateQueueNumber(string $department): string
    {
        // Determine prefix based on department
        $prefix = ($department === 'College') ? 'C' : 'B'; // 'B' for Basic Education

        // Get the latest queue number for the selected department
        $latestQueue = Queue::where('department', $department)
                            ->orderBy('queue_number', 'desc')
                            ->first();

        if ($latestQueue) {
            // Extract the number part from the latest queue number and increment it
            $lastQueueNumber = (int)substr($latestQueue->queue_number, 1); // Extract number part
            $newQueueNumber = $lastQueueNumber + 1;
        } else {
            // Start with 1 if no queues exist for the department
            $newQueueNumber = 1;
        }

        // Format the queue number with leading zeros
        $formattedQueueNumber = sprintf('%s%04d', $prefix, $newQueueNumber);

        return $formattedQueueNumber;
    }
}

# Reflective Thinking: Late Submission with Auto-Penalty

## Question
How would you allow late submission with auto-penalty?

## Answer

To implement a late submission system with an automatic penalty, we need to modify the submission logic in the backend (Controller) rather than strictly blocking late submissions.

### Conceptual Logic
1. **Submission Window**: Allow submissions even after the `due_date` has passed.
2. **Detection**: When a submission is received, compare the current timestamp (`now()`) with the assignment's `due_date`.
3. **Calculation**: If `now() > due_date`, calculate the delay (e.g., in hours or days).
4. **Penalty Application**: Apply a predefined penalty rule (e.g., 5% deduction per day late) to the final grade.

### Implementation Steps

1. **Database Update**: 
   Add a `penalty` or `late_deduction` column to the `submissions` table to store the calculated penalty value.
   ```php
   $table->decimal('penalty', 5, 2)->default(0);
   ```

2. **Controller Logic (`AssignmentController` - `submit` method)**:
   ```php
   public function submit(Request $request, Assignment $assignment)
   {
       // ... validation and file upload ...

       $now = now();
       $penalty = 0;

       if ($now->greaterThan($assignment->due_date)) {
           // Calculate hours late
           $hoursLate = $now->diffInHours($assignment->due_date);
           
           // Example Rule: 1 point deduction per hour late, max 50 points
           $penalty = min($hoursLate * 1, 50); 
       }

       Submission::updateOrCreate(
           ['assignment_id' => $assignment->id, 'user_id' => Auth::id()],
           [
               'file_path' => $path,
               'submitted_at' => $now,
               'penalty' => $penalty, // Store the penalty
           ]
       );

       // ... redirect ...
   }
   ```

3. **Grading**: When the admin grades the assignment, the system should display the "Raw Score", the "Penalty", and the "Final Score" (Raw - Penalty).

### Considerations
- **Grace Period**: You might want to allow a 5-10 minute grace period for slow uploads.
- **Max Penalty**: Ensure the penalty doesn't exceed 100% or a capped amount.
- **User Feedback**: Clearly warn the student if they are submitting late and what the estimated penalty will be.

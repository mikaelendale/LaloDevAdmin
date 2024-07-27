<?php
// app/Http/Controllers/EventsController.php
namespace App\Http\Controllers; 
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:events',
            'featured_image' => 'nullable|image|max:4096', // Image validation
            'status' => 'required|in:draft,published,pending',
            'published_at' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        Log::info('Validation passed.');

        // Check if the request has a file for 'featured_image'
        if ($request->hasFile('featured_image')) {
            Log::info('Featured image detected.');

            // Store the uploaded file in the 'public/featured_images' directory
            $path = $request->file('featured_image')->store('featured_images', 'event_images');
            Log::info('Image stored at: ' . $path);

            // Remove any directory prefix for saving to the database
            $validated['featured_image'] = $path;
            Log::info('Image path for database: ' . $validated['featured_image']);

        }

        // Set the authenticated user's ID
        $validated['user_id'] = auth()->id();

        // Create a new Event with the validated data
        Events::create($validated);
        Log::info('Event created successfully.');

        // Redirect to the Event index with a success message
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
    public function index()
    {
        $events = Events::all(); // Fetch all Event posts
        return view('events.index', compact('events'));
    } 
    public function edit($id)
    {
        $events = Events::findOrFail($id); // Find the Event post by ID
        return view('events.edit', compact('events')); // Return the edit view with the Event data
    }
    public function detail($id)
    {
        $events = Events::find($id);

        if ($events) {
            return view('events.detail', compact('events'));
        } else {
            return redirect()->route('events.index')->with('error', 'Event not found');
        }

    }

    public function update(Request $request, $id)
    {
        $events = Events::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug,' . $events->id,
            'featured_image' => 'nullable|image|max:4096', // Image validation
            'status' => 'required|in:draft,published,pending',
            'published_at' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        // Check if the request has a file for 'featured_image'
        if ($request->hasFile('featured_image')) {
            // Delete the old image if it exists
            if ($events->featured_image) {
                Storage::disk('events_images')->delete($events->featured_image);
            }

            // Store the uploaded file in the 'external_storage' disk
            $path = $request->file('featured_image')->store('featured_images', 'events_images');

            // Save the path to the database
            $validated['featured_image'] = $path;
        }

        // Update the Event post with the validated data
        $events->update($validated);

        // Redirect to the Event index with a success message
        return redirect()->route('events.index')->with('success', 'Event post updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $events)
    {
        $events->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

}


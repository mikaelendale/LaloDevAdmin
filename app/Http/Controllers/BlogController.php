<?php
// app/Http/Controllers/BlogController.php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs',
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
            $path = $request->file('featured_image')->store('featured_images', 'blog_images');
            Log::info('Image stored at: ' . $path);

// Remove any directory prefix for saving to the database
            $validated['featured_image'] = $path;
            Log::info('Image path for database: ' . $validated['featured_image']);

        }

        // Set the authenticated user's ID
        $validated['user_id'] = auth()->id();

        // Create a new blog post with the validated data
        Blog::create($validated);
        Log::info('Blog post created successfully.');

        // Redirect to the blogs index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }
    public function index()
    {
        $blogs = Blog::all(); // Fetch all blog posts
        return view('blogs.index', compact('blogs'));
    }
    public function all()
    {
        $blogs = Blog::all(); // Fetch all blog posts
        return view('blogs.all', compact('blogs'));
    }
    public function edit($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog post by ID
        return view('blogs.edit', compact('blog')); // Return the edit view with the blog data
    }
    public function detail($id)
    {
        $blog = Blog::find($id);

        if ($blog) {
            return view('blogs.detail', compact('blog'));
        } else {
            return redirect()->route('blog.index')->with('error', 'blog not found');
        }

    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'featured_image' => 'nullable|image|max:4096', // Image validation
            'status' => 'required|in:draft,published,pending',
            'published_at' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        // Check if the request has a file for 'featured_image'
        if ($request->hasFile('featured_image')) {
            // Delete the old image if it exists
            if ($blog->featured_image) {
                Storage::disk('blog_images')->delete($blog->featured_image);
            }

            // Store the uploaded file in the 'external_storage' disk
            $path = $request->file('featured_image')->store('featured_images', 'blog_images');

            // Save the path to the database
            $validated['featured_image'] = $path;
        }

        // Update the blog post with the validated data
        $blog->update($validated);

        // Redirect to the blogs index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }

}

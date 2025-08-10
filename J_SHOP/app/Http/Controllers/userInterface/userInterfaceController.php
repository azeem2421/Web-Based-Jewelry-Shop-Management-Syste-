<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\CareerApplication;
use Barryvdh\DomPDF\Facade\Pdf;


class userInterfaceController extends Controller
{
    public function index()
    {
        // Fetch latest 8 products for Featured section
        $featuredProducts = Product::latest()->take(8)->get();

        // Fetch 4 random product images for Gallery Preview
        $galleryItems = Product::inRandomOrder()->take(4)->get();

        // Fetch all categories for Navbar dropdown
        $categories = Category::all();

        // Pass all datasets to the blade view
        return view('UserInterface.home', compact('featuredProducts', 'galleryItems', 'categories'));
    }



public function viewCategoryById($id)
{
    $category = Category::findOrFail($id);
    $products = Product::where('category_id', $id)->latest()->paginate(12);
    $categories = Category::all(); // For navbar

    return view('UserInterface.categoryProducts', compact('category', 'products', 'categories'));
}



    public function about()
{
    $categories = Category::all();
    return view('UserInterface.about', compact('categories'));
}

public function services()
{
    $categories = Category::all();
    return view('UserInterface.services', compact('categories'));
}

public function contact()
{
    $categories = Category::all();
    return view('UserInterface.contact', compact('categories'));
}

public function careers()
{
    $categories = Category::all();
    return view('UserInterface.careers', compact('categories'));
}

public function submitContact(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Store in DB
    ContactMessage::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Your message has been sent successfully!');
}

public function submitCV(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'role' => 'required|string',
        'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    $cvPath = $request->file('cv')->store('cvs', 'public');

    // Save to DB
    CareerApplication::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'cv_path' => $cvPath,
        'checked' => false
    ]);

    return back()->with('success', 'Your CV has been submitted successfully!');
}


public function adminMessages()
{
    $messages = ContactMessage::latest()->paginate(10);
    return view('admin.messages.index', compact('messages'));
}

public function generateMessageReport()
{
    $messages = ContactMessage::latest()->get();
    $pdf = Pdf::loadView('admin.messages.report', compact('messages'));
    return $pdf->download('contact_messages_report.pdf');
}


public function exploreCollection(Request $request)
{
    $query = Product::with('category');

    // Filter by search keyword
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter by category
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    // Get paginated results
    $products = $query->latest()->paginate(12);

    // All categories for the filter dropdown
    $categories = Category::all();

    return view('userInterface.collection', [
        'products' => $products,
        'categories' => $categories,
        'search' => $request->search,
        'selectedCategory' => $request->category,
    ]);
}



public function viewProduct($id)
{
    $product = Product::with('category')->findOrFail($id);
    $categories = Category::all();

    return view('userInterface.product', compact('product', 'categories'));
}



public function gallery()
{
    $products = Product::all();  // or paginate if needed
    $categories = Category::all(); // for navbar

    return view('UserInterface.gallery', compact('products', 'categories'));
}

    
}

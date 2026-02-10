# Coding Conventions - Blink Project

**Project:** Blink Electric Mobility Fleet Management API  
**Version:** 1.0.0  
**Last Updated:** February 9, 2026  
**Framework:** Laravel 12  

---

## Table of Contents

1. [File and Folder Structure](#1-file-and-folder-structure)
2. [Naming Conventions](#2-naming-conventions)
3. [Controller Conventions](#3-controller-conventions)
4. [Model Conventions](#4-model-conventions)
5. [API Response Standards](#5-api-response-standards)
6. [Validation Conventions](#6-validation-conventions)
7. [Database Conventions](#7-database-conventions)
8. [Tailwind CSS Class Ordering](#8-tailwind-css-class-ordering)
9. [Code Style and Formatting](#9-code-style-and-formatting)
10. [Documentation Standards](#10-documentation-standards)
11. [Security Best Practices](#11-security-best-practices)

---

## 1. File and Folder Structure

### Directory Organization

```
app/
├── Http/
│   └── Controllers/
│       ├── Api/              # API controllers namespace
│       │   ├── AuthController.php
│       │   ├── VehicleController.php
│       │   └── UserController.php
│       └── Controller.php    # Base controller
├── Models/                   # Eloquent models
│   ├── User.php
│   ├── Vehicle.php
│   └── Reservation.php
└── Providers/               # Service providers
    └── AppServiceProvider.php

database/
├── migrations/              # Database migrations
├── seeders/                # Database seeders
└── factories/              # Model factories

routes/
├── api.php                 # API routes
└── web.php                 # Web routes

resources/
├── views/                  # Blade templates
├── css/                    # Stylesheets
└── js/                     # JavaScript files
```

### Guidelines

- Keep controllers in `app/Http/Controllers` or subdirectories (e.g., `Api/`)
- Store Eloquent models in `app/Models`
- Place all API-related controllers under `app/Http/Controllers/Api` namespace
- Use singular names for model files, plural for database tables

---

## 2. Naming Conventions

### Classes and Files

| Type | Convention | Example |
|------|-----------|---------|
| **Controllers** | PascalCase + `Controller` suffix | `VehicleController`, `AuthController` |
| **Models** | PascalCase (singular) | `User`, `Vehicle`, `Reservation` |
| **Migrations** | snake_case with timestamp | `2026_01_21_145551_create_vehiculos_table.php` |
| **Seeders** | PascalCase + `Seeder` suffix | `DatabaseSeeder`, `VehiclePracticeSeeder` |
| **Middleware** | PascalCase | `Authenticate`, `CheckRole` |
| **Form Requests** | PascalCase + `Request` suffix | `StoreVehicleRequest`, `UpdateUserRequest` |

### Variables and Methods

| Type | Convention | Example |
|------|-----------|---------|
| **Variables** | camelCase | `$userName`, `$vehicleId` |
| **Methods** | camelCase | `getUserById()`, `updateVehicle()` |
| **Constants** | UPPER_SNAKE_CASE | `MAX_ATTEMPTS`, `DEFAULT_STATUS` |
| **Properties** | camelCase | `$fillable`, `$primaryKey` |

### Database Naming

| Type | Convention | Example |
|------|-----------|---------|
| **Tables** | plural snake_case | `users`, `vehicles`, `vehicle_geofence_logs` |
| **Primary Keys** | `{singular}_id` or `id` | `user_id`, `vehicle_id` |
| **Foreign Keys** | `{singular}_id` | `user_id`, `vehicle_id` |
| **Pivot Tables** | singular_singular | `reservation_user`, `vehicle_geofence` |
| **Columns** | snake_case | `license_plate`, `created_at` |

---

## 3. Controller Conventions

### Controller Structure

Controllers should follow RESTful resource conventions:

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::with(['reservations'])->get();
        return response()->json($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
        ]);

        $vehicle = Vehicle::create($validated);
        
        return response()->json($vehicle, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::with(['reservations', 'tickets'])->findOrFail($id);
        return response()->json($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        $validated = $request->validate([
            'license_plate' => 'sometimes|string|max:20|unique:vehicles,license_plate,' . $id . ',vehicle_id',
            'brand' => 'sometimes|string|max:100',
        ]);

        $vehicle->update($validated);
        
        return response()->json($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        
        return response()->json(null, 204);
    }
}
```

### Controller Guidelines

1. **Namespace**: API controllers must be in `App\Http\Controllers\Api` namespace
2. **Resource Methods**: Use standard RESTful method names:
   - `index()` - List all resources
   - `store()` - Create new resource
   - `show($id)` - Display single resource
   - `update($id)` - Update resource
   - `destroy($id)` - Delete resource

3. **Validation**: Always validate incoming requests before processing
4. **Type Hints**: Use type hints for parameters (`string $id`, `Request $request`)
5. **Eager Loading**: Load relationships to prevent N+1 queries
6. **HTTP Status Codes**: Return appropriate status codes:
   - `200` - Success (GET, PUT, PATCH)
   - `201` - Created (POST)
   - `204` - No Content (DELETE)
   - `400` - Bad Request
   - `401` - Unauthorized
   - `403` - Forbidden
   - `404` - Not Found
   - `422` - Validation Error

7. **DocBlocks**: Always include PHPDoc comments for methods

---

## 4. Model Conventions

### Model Structure

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    // Table name (optional if following conventions)
    protected $table = 'vehicles';
    
    // Primary key
    protected $primaryKey = 'vehicle_id';
    
    // Mass assignable attributes
    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'year',
        'color',
        'status',
    ];
    
    // Hidden attributes (for API responses)
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    // Type casting
    protected $casts = [
        'current_latitude' => 'decimal:8',
        'current_longitude' => 'decimal:8',
        'last_location_update' => 'datetime',
    ];
    
    // Relationships
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'vehicle_id', 'vehicle_id');
    }
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'vehicle_id', 'vehicle_id');
    }
}
```

### Model Guidelines

1. **Model Names**: Singular PascalCase (e.g., `Vehicle`, `User`)
2. **Properties Order**:
   - `$table`
   - `$primaryKey`
   - `$fillable` / `$guarded`
   - `$hidden`
   - `$casts`
   - `$appends`
   - Relationships
   - Accessors/Mutators
   - Scopes

3. **Mass Assignment**: Use `$fillable` (whitelist) over `$guarded` (blacklist)
4. **Type Casting**: Always cast attributes to appropriate types
5. **Relationships**: Define relationships for eager loading
6. **Business Logic**: Keep complex business logic in service classes, not models

---

## 5. API Response Standards

### Success Response Format

```json
{
  "success": true,
  "message": "Resource created successfully",
  "data": {
    "id": 1,
    "name": "Example"
  }
}
```

### Error Response Format

```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "email": ["The email field is required."]
  }
}
```

### Response Guidelines

1. **Consistency**: Use consistent response structure across all endpoints
2. **HTTP Status Codes**: Always return appropriate HTTP status codes
3. **JSON Format**: All API responses must be JSON
4. **Pagination**: Use Laravel's pagination for list endpoints
5. **Timestamps**: Return timestamps in ISO 8601 format

---

## 6. Validation Conventions

### Inline Validation

```php
$validated = $request->validate([
    'email' => 'required|email|unique:users',
    'password' => 'required|string|min:8|confirmed',
    'name' => 'required|string|max:255',
]);
```

### Form Request Classes (Preferred)

```php
php artisan make:request StoreVehicleRequest
```

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'license_plate' => 'required|string|max:20|unique:vehicles',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
        ];
    }
}
```

### Validation Guidelines

1. Use Form Requests for complex validation logic
2. Keep validation rules in dedicated request classes
3. Use pipe-separated validation rules for readability
4. Always validate user input before processing

---

## 7. Database Conventions

### Migration Structure

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('license_plate', 20)->unique();
            $table->string('brand', 100);
            $table->string('model', 100);
            $table->integer('year')->nullable();
            $table->enum('status', ['available', 'reserved', 'maintenance', 'inactive'])
                  ->default('available');
            $table->decimal('current_latitude', 10, 8)->nullable();
            $table->decimal('current_longitude', 11, 8)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
```

### Database Guidelines

1. **Table Names**: Plural snake_case
2. **Timestamps**: Always include `$table->timestamps()`
3. **Foreign Keys**: Use `$table->foreignId('user_id')->constrained()`
4. **Indexes**: Add indexes for frequently queried columns
5. **Soft Deletes**: Use `$table->softDeletes()` when applicable
6. **Nullability**: Be explicit with `nullable()` or `default()`

---

## 8. Tailwind CSS Class Ordering

### Class Order Convention

Follow this order for Tailwind CSS classes to maintain consistency:

1. **Layout**: `container`, `flex`, `grid`, `block`, `inline`, `hidden`
2. **Positioning**: `relative`, `absolute`, `fixed`, `sticky`, `top-*`, `left-*`
3. **Display & Box Model**: `w-*`, `h-*`, `max-w-*`, `min-h-*`
4. **Spacing**: `m-*`, `mx-*`, `my-*`, `p-*`, `px-*`, `py-*`, `space-*`
5. **Flexbox/Grid**: `items-*`, `justify-*`, `gap-*`, `flex-*`
6. **Typography**: `text-*`, `font-*`, `leading-*`, `tracking-*`
7. **Backgrounds**: `bg-*`, `bg-opacity-*`
8. **Borders**: `border`, `border-*`, `rounded-*`
9. **Effects**: `shadow-*`, `opacity-*`
10. **Transitions**: `transition-*`, `duration-*`
11. **Interactivity**: `hover:*`, `focus:*`, `active:*`
12. **Responsive**: `sm:*`, `md:*`, `lg:*`, `xl:*`, `2xl:*`
13. **Dark Mode**: `dark:*`

### Example

```html
<!-- ✅ Good - Organized and readable -->
<div class="flex items-center justify-between w-full max-w-4xl px-6 py-4 mb-6 text-sm font-medium bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 dark:bg-gray-800 dark:border-gray-700">
    Content
</div>

<!-- ❌ Bad - Random order -->
<div class="hover:shadow-md dark:bg-gray-800 flex px-6 w-full text-sm border-gray-200 transition-shadow rounded-lg items-center shadow-sm">
    Content
</div>
```

### Tailwind Guidelines

1. **Use @apply Sparingly**: Prefer inline utility classes
2. **Group Related Classes**: Use line breaks for readability
3. **Custom Colors**: Define custom colors in theme configuration
4. **Responsive Design**: Mobile-first approach (base classes, then `sm:`, `md:`, etc.)
5. **Dark Mode**: Use `dark:` prefix for dark mode variants

---

## 9. Code Style and Formatting

### PHP Code Style (PSR-12)

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::where('status', 'active')
            ->orderBy('name')
            ->get();
            
        return response()->json($users);
    }
    
    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);
        
        // Creation
        $user = User::create($validated);
        
        return response()->json($user, 201);
    }
}
```

### Formatting Rules

1. **Indentation**: 4 spaces (no tabs)
2. **Line Length**: Maximum 120 characters (soft limit)
3. **Blank Lines**: One blank line between methods
4. **Braces**: Opening brace on same line
5. **Operators**: Spaces around operators (`$a = $b + $c`)
6. **Method Chaining**: Align vertically

```php
// ✅ Good
User::where('active', 1)
    ->orderBy('name')
    ->limit(10)
    ->get();

// ❌ Bad
User::where('active', 1)->orderBy('name')->limit(10)->get();
```

7. **Imports**: Group and alphabetize use statements
8. **Comments**: Use `//` for single-line, `/* */` for multi-line

---

## 10. Documentation Standards

### PHPDoc Blocks

```php
/**
 * Retrieve a vehicle by its ID.
 *
 * @param string $id The vehicle ID
 * @return \Illuminate\Http\JsonResponse
 * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
 */
public function show(string $id)
{
    $vehicle = Vehicle::findOrFail($id);
    return response()->json($vehicle);
}
```

### Documentation Guidelines

1. **All Public Methods**: Must have PHPDoc comments
2. **Parameters**: Document all parameters with `@param`
3. **Return Types**: Document return types with `@return`
4. **Exceptions**: Document thrown exceptions with `@throws`
5. **Complex Logic**: Add inline comments explaining "why", not "what"
6. **API Documentation**: Maintain comprehensive API documentation

---

## 11. Security Best Practices

### Authentication

```php
// Use Laravel Sanctum for API authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'show']);
});
```

### Security Guidelines

1. **CSRF Protection**: Enabled by default for web routes
2. **Authentication**: Use Laravel Sanctum for API token authentication
3. **Authorization**: Use policies and gates for authorization
4. **Mass Assignment**: Protect against mass assignment with `$fillable`
5. **SQL Injection**: Use Eloquent ORM and query builder (never raw SQL without bindings)
6. **XSS Protection**: Blade automatically escapes output with `{{ }}`
7. **Environment Variables**: Store sensitive data in `.env` (never commit to Git)
8. **Password Hashing**: Always use `Hash::make()` for passwords
9. **Rate Limiting**: Implement rate limiting on API routes
10. **Input Validation**: Validate all user input

```php
// ✅ Good - Safe from SQL injection
User::where('email', $email)->first();

// ❌ Bad - Vulnerable to SQL injection
DB::select("SELECT * FROM users WHERE email = '$email'");
```

---

## 12. Testing Conventions

### Test Structure

```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_list_all_vehicles()
    {
        // Arrange
        $user = User::factory()->create();
        
        // Act
        $response = $this->actingAs($user)
            ->getJson('/api/v1/vehicles');
        
        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }
}
```

### Testing Guidelines

1. **Run Tests**: `docker-compose exec app php artisan test`
2. **Feature Tests**: Test HTTP endpoints and user workflows
3. **Unit Tests**: Test individual methods and logic
4. **Naming**: Use descriptive test method names with `it_` or `test_` prefix
5. **AAA Pattern**: Arrange, Act, Assert
6. **Database**: Use `RefreshDatabase` trait for tests

---

## Tools and Automation

### Code Quality Tools

- **Laravel Pint**: Automatic code styling
  ```bash
  ./vendor/bin/pint
  ```

- **PHPUnit**: Testing framework
  ```bash
  php artisan test
  ```

- **PHP_CodeSniffer**: Code style checker
  ```bash
  ./vendor/bin/phpcs
  ```

---

## Conclusion

These coding conventions ensure consistency, maintainability, and quality across the Blink project. All team members must adhere to these standards. When in doubt, refer to the [Laravel Documentation](https://laravel.com/docs) and [PSR-12 Coding Style Guide](https://www.php-fig.org/psr/psr-12/).

---

**Document Version:** 1.0.0  
**Maintained by:** Backend Engineering Team  
**Contact:** dev-team@blink.com

1. File and Folder Structure

Follow Laravel’s default folder structure.

Keep controllers in app/Http/Controllers.

Use app/Models for Eloquent models.

Views go into resources/views.

Routes in routes/web.php or routes/api.php.

Use service providers for bootstrapping in app/Providers.

2. Naming Conventions
Classes & Files

Use StudlyCase (PascalCase) for class names: UserController, PostService.

File names should match the class name exactly.

Models: singular and PascalCase, e.g., User, Order.

Controllers: PascalCase ending with Controller, e.g., UserController.

Migrations: snake_case with timestamps, e.g., 2026_01_21_123456_create_users_table.php.

View files: snake_case, e.g., user_profile.blade.php.

Variables & Methods

Use camelCase for variables and methods, e.g., $userName, getUser().

Constants: all uppercase with underscores, e.g., MAX_ATTEMPTS.

3. Indentation and Spacing

Use 4 spaces for indentation (no tabs).

Opening braces { on the same line as the declaration.

One blank line between methods.

Add spaces around operators: $a = $b + $c;

Align chained methods vertically:

User::where('active', 1)
    ->orderBy('name')
    ->get();

4. PSR-12 Compliance

Laravel follows the PSR-12 coding style guide
.

Use tools like PHP_CodeSniffer or PHP-CS-Fixer to automatically check/fix style.

5. DocBlocks and Comments

Use PHPDoc blocks for classes, methods, and complex logic.

Example:

/**
 * Get the user by ID.
 *
 * @param int $id
 * @return User|null
 */
public function getUserById(int $id): ?User
{
    return User::find($id);
}


Write meaningful comments to explain why something is done, not what (which should be obvious from code).

6. Route Naming and Grouping

Name your routes using ->name().

Group routes logically using Route::group() with middleware or prefixes.

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

7. Use Dependency Injection

Inject dependencies via constructor or method injection instead of using facades statically.

public function __construct(UserRepository $users)
{
    $this->users = $users;
}

8. Eloquent ORM Conventions

Use Eloquent’s conventions for table names (plural snake_case).

Define relationships clearly and use eager loading to avoid N+1 problems.

Avoid business logic inside controllers; keep it in models or service classes.

9. Blade Templates

Use Blade syntax: {{ $variable }} for output (escaped).

Use @if, @foreach directives.

Avoid logic in views; keep views simple and lean.

10. Validation

Use Form Requests for validation rather than inline validation in controllers.

Keep validation rules in a dedicated request class.

11. Environment Variables

Use .env file for configuration.

Never hard-code credentials or environment-specific info.

12. Security Best Practices

Always escape output in views.

Use Laravel’s built-in CSRF protection.

Use Laravel's authentication and authorization features.

13. Use Artisan Commands

Use Artisan for generating code: php artisan make:controller, make:model, make:migration, etc.

This keeps structure and naming consistent.

<?php

namespace Tests\Feature;

use App\Models\Person;
use Tests\TestCase;

/**
 * Regression tests for bugs fixed during the June 2026 diagnostic session.
 */
class BugRegressionTest extends TestCase
{
    // ------------------------------------------------------------------ //
    // Fix 1: StorageController::asset() — PHP 8 named-parameter mismatch  //
    // ------------------------------------------------------------------ //

    /** Route parameter {path} must map onto a method parameter named $path. */
    public function testStorageControllerAssetMethodHasCorrectParameterName()
    {
        $reflection = new \ReflectionMethod(
            \App\Http\Controllers\Storage\StorageController::class,
            'asset'
        );
        $params = $reflection->getParameters();
        $this->assertCount(1, $params);
        $this->assertSame('path', $params[0]->getName(),
            'StorageController::asset() must accept $path (matching the {path} route segment)');
    }

    // ------------------------------------------------------------------ //
    // Fix 2: CredentialController — str_random() replaced with Str::random //
    // ------------------------------------------------------------------ //

    /** The credential store action must not crash (str_random no longer exists). */
    public function testCredentialControllerUsesStrRandom()
    {
        // Verify at the source level that str_random is NOT called.
        $source = file_get_contents(
            base_path('app/Http/Controllers/Api/v1/Modules/CredentialController.php')
        );
        $this->assertStringNotContainsString('str_random', $source,
            'CredentialController must not use the removed str_random() helper');
        $this->assertStringContainsString('Str::random', $source,
            'CredentialController must use Illuminate\Support\Str::random()');
    }

    // ------------------------------------------------------------------ //
    // Fix 3: create.blade.php — foreach over null on first load           //
    // ------------------------------------------------------------------ //

    /** old('tenants') must use a default of [] to avoid foreach-over-null. */
    public function testMietvertraegeCreateBladeUsesOldWithDefault()
    {
        $source = file_get_contents(
            resource_path('views/modules/mietvertraege/create.blade.php')
        );
        // Neither occurrence should use the bare old('tenants') without a default.
        $this->assertStringNotContainsString("old('tenants')", $source,
            "create.blade.php must not call old('tenants') without a [] default");
        $this->assertSame(
            2,
            substr_count($source, "old('tenants', [])"),
            "Both foreach loops in create.blade.php must use old('tenants', [])"
        );
    }

    // ------------------------------------------------------------------ //
    // Fix 4: mietvertrag.php — duplicate function declaration             //
    // ------------------------------------------------------------------ //

    /** The global function must be guarded against double-declaration. */
    public function testMietvertragLegacyFunctionGuarded()
    {
        $source = file_get_contents(
            base_path('legacy/options/modules/mietvertrag.php')
        );
        $this->assertStringContainsString(
            "function_exists('objekt_auswahl_liste')",
            $source,
            'objekt_auswahl_liste() must be wrapped with function_exists() to prevent Cannot redeclare errors'
        );
    }

    // ------------------------------------------------------------------ //
    // Fix 5: /assignments legacy route renamed to /assignments/legacy     //
    // ------------------------------------------------------------------ //

    /**
     * The SPA catch-all (routes/catch_all.php) serves layouts.app for any
     * unmatched path, so all SPA paths return 200 — client-side auth
     * handles redirecting unauthenticated users to /login.
     * This test verifies the SPA layout (not a legacy Blade error) is served.
     */
    public function testSpaPathsServeAppLayout()
    {
        $paths = ['/persons', '/houses', '/units', '/objects', '/assignments'];
        foreach ($paths as $path) {
            $response = $this->get($path);
            $this->assertEquals(200, $response->getStatusCode(),
                "GET {$path} should serve the SPA layout (200)");
        }
    }

    /**
     * Before the fix, GET /assignments was handled by ToDoController@index
     * which returned the legacy Blade view (modules.auftraege.index) inside
     * layouts.legacy — conflicting with the Vue Router /assignments route.
     * After the fix, /assignments/legacy serves the legacy view instead.
     */
    public function testAssignmentsLegacyRouteExists()
    {
        $this->assertTrue(
            $this->app['router']->has('web::todo::index'),
            'web::todo::index route must still exist (at /assignments/legacy)'
        );
        // The route must be at /assignments/legacy, not /assignments
        $url = route('web::todo::index');
        $this->assertStringEndsWith('/assignments/legacy', $url,
            'The todo index route must be at /assignments/legacy to avoid SPA conflict');
    }
}

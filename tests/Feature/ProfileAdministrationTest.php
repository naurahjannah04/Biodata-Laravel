<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileAdministrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_profile_displays_profile_details(): void
    {
        Profile::factory()->create([
            'name' => 'Nadia Putri',
            'skills' => 'Laravel, UX Research',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Nadia Putri')
            ->assertSee('Laravel')
            ->assertSee('UX Research');
    }

    public function test_admin_can_sign_in_and_update_the_public_profile(): void
    {
        $admin = User::factory()->admin()->create();
        $profile = Profile::factory()->create();

        $this->post(route('admin.login.store'), [
            'email' => $admin->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.profile.edit'));

        $this->assertAuthenticatedAs($admin);

        $this->put(route('admin.profile.update'), [
            'name' => 'Nadia Putri',
            'title' => 'Product Designer',
            'location' => 'Jakarta, Indonesia',
            'email' => 'nadia@example.com',
            'phone' => '',
            'website' => 'https://nadia.example',
            'github_url' => 'https://github.com/nadia',
            'linkedin_url' => '',
            'instagram_url' => '',
            'avatar_url' => '',
            'about' => 'Membuat produk digital yang berguna.',
            'skills' => 'Product Design, Research',
            'experience' => 'Product Designer, 2022–sekarang',
            'education' => 'Desain Komunikasi Visual',
        ])->assertRedirect(route('admin.profile.edit'))
            ->assertSessionHas('status', 'Profil berhasil diperbarui.');

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'name' => 'Nadia Putri',
            'email' => 'nadia@example.com',
            'about' => 'Membuat produk digital yang berguna.',
        ]);
    }

    public function test_only_admins_can_open_or_update_the_editor(): void
    {
        $this->get(route('admin.profile.edit'))
            ->assertRedirect(route('admin.login'));

        $this->actingAs(User::factory()->create())
            ->get(route('admin.profile.edit'))
            ->assertForbidden();

        $this->put(route('admin.profile.update'), [])
            ->assertForbidden();
    }

    public function test_profile_updates_reject_invalid_emails(): void
    {
        $admin = User::factory()->admin()->create();
        $profile = Profile::factory()->create(['name' => 'Original Name']);

        $this->actingAs($admin)
            ->put(route('admin.profile.update'), [
                'name' => 'Changed Name',
                'title' => 'Designer',
                'location' => 'Jakarta',
                'email' => 'not-an-email',
                'about' => 'About',
                'skills' => 'Design',
                'experience' => 'Experience',
                'education' => 'Education',
            ])
            ->assertSessionHasErrors('email');

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'name' => 'Original Name',
        ]);
    }

    public function test_public_profile_escapes_user_provided_markup(): void
    {
        Profile::factory()->create([
            'about' => '<script>alert("hello")</script>',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('&lt;script&gt;', false)
            ->assertDontSee('<script>alert("hello")</script>', false);
    }
}

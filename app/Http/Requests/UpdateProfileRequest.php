<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin ?? false;
    }

    /**
     * @return array<string, list<string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:180'],
            'location' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'website' => ['nullable', 'url:http,https', 'max:2048'],
            'github_url' => ['nullable', 'url:http,https', 'max:2048'],
            'linkedin_url' => ['nullable', 'url:http,https', 'max:2048'],
            'instagram_url' => ['nullable', 'url:http,https', 'max:2048'],
            'avatar_url' => ['nullable', 'url:http,https', 'max:2048'],
            'about' => ['required', 'string', 'max:5000'],
            'skills' => ['required', 'string', 'max:1000'],
            'experience' => ['required', 'string', 'max:5000'],
            'education' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nama',
            'title' => 'profesi',
            'location' => 'lokasi',
            'email' => 'email',
            'phone' => 'nomor telepon',
            'website' => 'situs web',
            'github_url' => 'tautan GitHub',
            'linkedin_url' => 'tautan LinkedIn',
            'instagram_url' => 'tautan Instagram',
            'avatar_url' => 'tautan foto profil',
            'about' => 'tentang saya',
            'skills' => 'keahlian',
            'experience' => 'pengalaman',
            'education' => 'pendidikan',
        ];
    }
}

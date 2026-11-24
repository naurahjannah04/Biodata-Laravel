<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'location',
        'email',
        'phone',
        'website',
        'github_url',
        'linkedin_url',
        'instagram_url',
        'avatar_url',
        'about',
        'skills',
        'experience',
        'education',
    ];

    /**
     * @return array<string, string>
     */
    public static function defaults(): array
    {
        return [
            'name' => 'Raka Pratama',
            'title' => 'Creative Developer & Digital Storyteller',
            'location' => 'Bandung, Indonesia',
            'email' => 'hello@example.com',
            'phone' => '',
            'website' => '',
            'github_url' => '',
            'linkedin_url' => '',
            'instagram_url' => '',
            'avatar_url' => '',
            'about' => 'Saya senang mengubah ide menjadi pengalaman digital yang sederhana, bermakna, dan mudah digunakan. Perpaduan desain dan teknologi adalah cara saya bercerita.',
            'skills' => 'UI/UX Design, Front-end Development, Product Strategy, Design Systems',
            'experience' => "2022 — Sekarang\nIndependent Designer & Developer\nMembantu bisnis dan tim kreatif membangun produk digital dari riset hingga peluncuran.\n\n2020 — 2022\nProduct Designer\nMerancang pengalaman produk yang intuitif bersama tim lintas disiplin.",
            'education' => "2017 — 2021\nDesain Komunikasi Visual\nUniversitas Indonesia",
        ];
    }

    public static function current(): static
    {
        return static::query()->find(1) ?? new static(static::defaults());
    }

    /**
     * @return list<string>
     */
    public function skillsList(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->skills))));
    }

    public function initials(): string
    {
        $initials = collect(explode(' ', trim($this->name)))
            ->filter()
            ->take(2)
            ->map(static fn (string $part): string => mb_substr($part, 0, 1))
            ->implode('');

        return mb_strtoupper($initials);
    }
}
